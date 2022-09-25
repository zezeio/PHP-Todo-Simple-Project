<?php
include 'db.php';

session_start();

if(!isset($_SESSION['session']))
{
	header("Location:RegisterPanel/register.php");
}
else
{
	header("Location:UserPanel/index.php");		
} 
?>