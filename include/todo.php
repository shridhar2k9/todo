<?php
  mysql_connect("localhost","root","");
  mysql_select_db("practise");
 
   
  $action=$_POST["action"];
 
  if($action=="showcomment"){
     $show=mysql_query("Select * from todo;");
 
     while($row=mysql_fetch_array($show)){
        echo "<li><b>$row[name]</b></li>";
     }
  }
  else if($action=="addcomment"){
    $name=$_POST["name"];
 
     $query=mysql_query("INSERT INTO todo(name) values('$name') ");
 
     if($query){
        echo "Your comment has been sent";
     }
     else{
        echo "Error in sending your comment";
     }
  }
?>