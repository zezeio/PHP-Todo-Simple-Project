<?php
include '../db.php';

if($_POST)
{ 
    $username = htmlspecialchars($_POST["Username"], ENT_QUOTES);
    $userpass = htmlspecialchars(base64_encode($_POST["Password"]), ENT_QUOTES);

	$query = $db->prepare("select * from users where Username=:Username AND Password=:Password");
    $query->bindParam(':Username', $username); 
    $query->bindParam(':Password', $userpass); 
    $query->execute(); 

    if ($query->rowCount() > 0)
	{ 
        $output = $query->fetch(); 
        session_start();
		$_SESSION['session'] = true; 
        $_SESSION['Username'] = $output['Username']; 
        $_SESSION['Password'] = $output['Password'];
		$_SESSION['id'] = $output['id']; 
        header("Location:../UserPanel/index.php"); 
    } 
		else // 
		{
			echo "
			<div style='color:red; height:40px; border-radius:20px; font-size:21px;'>
				<p>
					<center>
						The Username or Password is incorrect. you are being directed.
					</center>
				</p>
			</div>
			<hr> ";
			header("Refresh:3 url=login.php");
		}
}
?>
