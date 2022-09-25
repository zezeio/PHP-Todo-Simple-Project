<?php
include '../db.php';

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
?>
<html>
<head>
	<title>Basic Login System</title>
	<link rel="stylesheet" href="css/main.css"/>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

	<div class="header">
	  <a href="index.php" class="logo">Basic Login System</a>
	  <div class="header-right">
		<a class="active" href="index.php">Home</a>
		<a id="ac" href="#">Profile</a>
		<a href="logout.php">Logout</a>
	  </div>
	</div>
	
	<!-- Profile View -->
	<dialog class="modal-bg" id="modal">
        <form action="" method="dialog">
            <div>
                <h2>Profile View</h2>
				<hr>
            </div>
            <div>
                <p>
                    <pre>Username:		<?php echo $output["Username"]; ?> </pre>
					<pre>FirstName:		<?php echo $output["FirstName"]; ?> </pre>
					<pre>LastName:		<?php echo $output["LastName"]; ?> </pre>
					<pre>Mail:			<?php echo $output["Mail"]; ?> </pre>
					<pre>About:			<?php echo $output["About"]; ?> </pre>
					<pre>Age:			<?php echo $output["Age"]; ?> </pre>
					<pre>Registered Date:		<?php echo $output["RegisterDate"]; ?> </pre>
                </p>
            </div>
            <div>
                <menu>
                    <button  class="close">Close</button>
                </menu>
            </div>
        </form>
    </dialog>

	
	<div>
	  <center>
		  <h1>Welcome, <?php echo $output["FirstName"]; ?> <?php echo $output["LastName"]; ?></h1>
	  </center>
	</div>
</body>
 <script>
        var modalAc=document.querySelector("#ac");
        var modal=document.querySelector("#modal");
        var output=document.querySelector("output");
 
        modalAc.addEventListener("click",function(){
            
            modal.showModal();
        });
 
        modal.addEventListener("close",function(){
        });
 
    </script>
</html>
<!--Else END
-->
<?php } } ?>







