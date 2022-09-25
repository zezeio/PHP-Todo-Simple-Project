<?php
//MYSQL PDO is used.
$MYSQL_Connection = array(
 'server' => 'localhost',			// Your Database Server (Default: localhost)
 'user' => 'root',					// Your Database UserName
 'pass' => '',						// Your Database Password
 'dbName' => 'todo-app'				// Your Database Name
);
try{
 $db = new PDO('mysql:host='.$MYSQL_Connection['server'].';dbname='.$MYSQL_Connection['dbName'].';charset=utf8mb4', $MYSQL_Connection['user'], $MYSQL_Connection['pass']);
}catch(PDOException $e){
 die('Database Error: ' . $e);
}
?>