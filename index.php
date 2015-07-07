<html>
   <head>
   <link href="css/style.css" typ="text/css" rel="stylesheet">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        
       <script type="text/javascript">
               $(document).ready(function(){

                   function c(msg){
                    console.log(msg);
                   }
 
                    function showComment(){
                      $.ajax({
                        type:"post",
                        url:"todo.php",
                        data:"action=showcomment",
                        success:function(data){
                             $("#comment").html(data);
                        }
                      });
                    }
 
                    showComment();
 
 
                    $("#load").submit(function(e) {
                      
                      e.preventDefault();

                        
                          var name=$("#name").val();
                        
                          $.ajax({
                              type:"post",
                              url:"todo.php",
                              data:"name="+name+"&action=addcomment",
                              success:function(data){
                                showComment();
                                  
                              }
 
                          });
                        
 
                    });

                    $("#delete").click(function(){
                      ids=new Array()
                      a=0;
                    $("input.chk:checked").each(function(){
                                  ids[a]=$(this).val();
                           a++;
                      });
                    c(ids); 

                  if(confirm("Are you sure want to delete?")){
                    $.ajax({
                            type:"post",
                            url:"todo.php",
                            data:"id="+ids+"&action=deletecomment",
                            success:function(res)
                            {
                             if(res==1)
                              {
                                  $("input.chk:checked").each(function(){
                                  $(this).parent().parent().remove();
                                  })
                              }
                            }
                          })
                        }
                  return false;
                    })
              
               });
       </script>
   </head>
 
   <body>
   <div class="col-md-12">
   <div class="col-md-4"></div>
   <div class="col-md-4 bg-primary">
   

        <form id="load" class="">
               <input type="text" class="text-center form-control input-lg" name="name" id="name"/>
               </br>
                    
               
               <div id="comment"  ></div>
               <input type="button" value="DELETE" id="delete" name="" class="btn btn-danger pull-right" />

        </form>
</div>
<div class="col-md-4 "></div>
    </div>
   </body>
</html>