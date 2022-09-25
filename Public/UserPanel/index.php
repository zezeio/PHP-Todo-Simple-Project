<?php
include '../db.php';
include '../functions.php';

session_start();
if(!isset($_SESSION['session']))
{
	header("Location:../index.php");
}
else
{ 
$id = $_SESSION['id'];
$query = $db->prepare("select * from users WHERE id = :id");
$query->execute(array( ":id" => $id ));
$output = $query->fetch(PDO::FETCH_ASSOC);
if( $query->rowCount() ){ 

get_header(); //header.php include (for > functions.php)
?>

<title><?php title(); ?></title>

<body class='snippet-body'>
	<div class="header">
	  <a href="index.php" class="logo"><?php title(); ?></a>
	  <div class="header-right">
		<a class="active" href="index.php">Home</a>
		<a data-toggle="modal" data-target="#ProfileDetails" href="#">Profile</a>
		<a href="logout.php">Logout</a>
	  </div>
	</div>
	<!--========================================================================================================-->
	<!-- Profile View -->
	
	<div class="modal fade" id="ProfileDetails" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Profile Details</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>
                    <pre>Username:		<?php echo $output["Username"]; ?> </pre>
					<pre>FirstName:		<?php echo $output["FirstName"]; ?> </pre>
					<pre>LastName:		<?php echo $output["LastName"]; ?> </pre>
					<pre>Mail:			<?php echo $output["Mail"]; ?> </pre>
			</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
		</div>
	</div>
	<!--========================================================================================================-->
	<!--Add Todo 
	--> 
	<?php
	if (isset($_POST["Todo_Add"]))
	{

		$siparis_ekle = $db->prepare("insert into todo_list set
		T_Title=:T_Title,
		T_UserID=:T_UserID
		");
		$kontrol_et = $siparis_ekle->execute(array(
		"T_Title" => htmlspecialchars($_POST["Todo_Title"], ENT_QUOTES),
		"T_UserID" => htmlspecialchars($_SESSION['id'], ENT_QUOTES)
		));

		if($kontrol_et)
		{
			echo '
				<div class="alert-succ"> 
				  <center><strong>Successful!</strong> Todo has been successfully added to the database.</center>
				</div>
				<script> setTimeout(function(){ window.location.assign("index.php"); }, 2000); </script>
				
				';	
		}
			else
			{
				echo "
				<div class='alert-error'> 
				 <center> <strong>Error!</strong> Something went wrong. You can contact the developer.</center>
				</div>
				";
			}
			
		}
	?>
	<!--========================================================================================================-->
	<div class="page-content page-container" id="page-content">
		<div class="padding">
			<div class="col-12">
				<div class="card px-12">
					<div class="card-body">
						<h4 class="card-title">My Todo list</h4>
						<form action="" method="POST" enctype="multipart/form-data">
						<div class="add-items d-flex">
							<input name="Todo_Title" type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
							<button name="Todo_Add" type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
						</div>
						</form>
						<div class="list-wrapper">
							<ul class="d-flex flex-column-reverse todo-list">
								<?php 
								$Tquery = $db->prepare('select * from todo_list WHERE T_UserID = '.$_SESSION['id'].''); 
								$Tquery->execute();
								while ($write = $Tquery->fetch(PDO::FETCH_ASSOC)) { 
								if($write['status'] != 'True'){
									echo '
									<li>
										<div class="form-check">
										<a data-toggle="modal" data-target="#TodoInstert'.$write["id"].'" href="#" class="form-check-label"><i class="fa-solid fa-check"></i> '.$write["T_Title"].' <i class="input-helper"></i></a>
										</div>
										<i class="remove mdi mdi-close-circle-outline"></i>
									</li>
									<div class="modal fade" id="TodoInstert'.$write["id"].'" tabindex="-1" role="dialog" aria-labelledby="TodoInstert" aria-hidden="true">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Do You Approve ?</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											'.$write["T_Title"].'
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<form action="" method="POST"><button type="submit" name="TodoComplate'.$write["id"].'" class="btn btn-primary">I Completed</button></form>
										  </div>
										</div>
									  </div>
									</div>
									';
										if (isset($_POST['TodoComplate'.$write["id"].'']))
											{
												
												$guncelle = $db->query('update todo_list set status = "True" where id = '.$write["id"].'');
												if ($guncelle->rowCount() > 0) {
												echo $guncelle->rowCount() . ' Updated Todo <script> setTimeout(function(){ window.location.assign("index.php"); }, 2000); </script>';
												} else {
												echo "Could not update any records. You can contact the developer.";
												}
											}
								}
								else
								{
									echo '
									<li class="completed">
										<div class="form-check">
										<a data-toggle="modal" data-target="#UnTodoInstert'.$write["id"].'" href="#" class="form-check-label"><i class="fa-solid fa-check"></i> '.$write["T_Title"].' <i class="input-helper"></i></a>
										</div>
									</li>
									<div class="modal fade" id="UnTodoInstert'.$write["id"].'" tabindex="-1" role="dialog" aria-labelledby="UnTodoInstert" aria-hidden="true">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Do You Approve ?</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  <div class="modal-body">
											'.$write["T_Title"].'
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<form action="" method="POST"><button type="submit" name="TodoComplate'.$write["id"].'" class="btn btn-primary">I Completed</button></form>
										  </div>
										</div>
									  </div>
									</div>
									';
										if (isset($_POST['TodoComplate'.$write["id"].'']))
											{
												
												$guncelle = $db->query('update todo_list set status = "False" where id = '.$write["id"].'');
												if ($guncelle->rowCount() > 0) {
												echo $guncelle->rowCount() . ' Updated Todo <script> setTimeout(function(){ window.location.assign("index.php"); }, 2000); </script>';
												} else {
												echo "Could not update any records. You can contact the developer.";
												}
											}
								}
								?>
								
								<?php }?>
							</ul> 
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!--========================================================================================================-->
	 
</body>
<?php get_footer();?>
<?php } } ?>