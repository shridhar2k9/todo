 <?php
 include "include/dbconfig.php";
   
  $action=$_POST["action"];
 
  if($action=="showcomment"){
     $show=mysql_query("Select * from todo;");
 
     while($row=mysql_fetch_array($show)){
        echo "<div id='disp'> <input type='checkbox' id='check' name='check' value='".$row['id']."' /><b>$row[name]</b></div>";

     }
  }

  else if($action=="addcomment")
  {
    $name=$_POST["name"];
if($name=="")
{
      alert("Please enter TO-Do datails"); 
  
}
 else
 {
     $query=mysql_query("INSERT INTO todo(name) values('$name') ");

 }
}
else if($action=="deletecomment")
{
  $id=$_POST["id"];
  if($id=="")
{
      alert("Please enter TO-Do datails"); 
  
}
 else
 {
     $query=mysql_query("DELETE FROM   todo where id='$id' ");

 }
}
?>