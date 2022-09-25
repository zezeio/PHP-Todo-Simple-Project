<?php
include '../db.php';

if (isset($_POST["register"]))
{
	$RegisterAdd = $db->prepare("insert into users set
	Username=:Username,
	FirstName=:FirstName,
	LastName=:LastName,
	Mail=:Mail,
	Password=:Password
	");
	$control = $RegisterAdd->execute(array(
	"Username" => htmlspecialchars($_POST["Username"], ENT_QUOTES),
	"FirstName" => htmlspecialchars($_POST["FirstName"], ENT_QUOTES),
	"LastName" => htmlspecialchars($_POST["LastName"], ENT_QUOTES),
	"Mail" => htmlspecialchars($_POST["EMail"], ENT_QUOTES),
	"Password" => htmlspecialchars(base64_encode($_POST["Password"]), ENT_QUOTES)
	));
	
	if($control)
	{
		echo "
			<div class='alert-succ'> 
			  <strong>Registration Successful</strong>You are directing...
			</div>
			";
			header("Refresh: 2; url=../UserPanel/index.php");
	}
		else
		{
			echo "
			<div class='alert-error'> 
			  <strong>Error!</strong> Something went wrong. You can contact the developer.
			</div>
			";
		}
		
	}
?>
