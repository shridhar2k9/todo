 <?php
 //including database connectivity
 include "include/dbconfig.php";
  //based on action sent from ajax call it will display the "showcomment" from database
 $action=$_POST["action"];
  if($action=="showcomment")
  {
     $show=mysql_query("Select * from todo order by id;");
      while($row=mysql_fetch_array($show))
      {
        $id=$row['id'];
        echo "<div class='disp_".$id."'><input  type='checkbox' name='check' id='check_".$id."' value='".$id."' /><label for='check_".$id."'>   $row[name]</label></div>";
      }
  }
//insert value to the database
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
//delete values from database
else if($action=="deletecomment")
{

  $id=$_POST["id"];
  

    if($id=="")
    {
          alert("Please check the items"); 
      
    }
    else
       {
          if(isset($_POST["id"]))
          {
            $sql="select * from todo ";
            $res=mysql_query($sql) or die("Error: ". mysql_error());

          while($row = mysql_fetch_array($res))
          {
          if($id==$row['id']);
           {
            $query=mysql_query("DELETE FROM   todo where id = '$id'") or die(mysql_error());
           } 
          } 
          }
        }
}

?>
