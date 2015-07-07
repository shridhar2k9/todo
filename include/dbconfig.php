<?php
  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "practise";
  $con = mysql_connect($host,$user,$pass);
   if(! $con )
{
  die('Could not connect' . mysql_error());
}
  mysql_select_db($databaseName, $con); 
  ?>