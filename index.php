<html>
   <head>
 
       <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
       <script type="text/javascript" src="js/jquery.min.js"></script>
        
       <script type="text/javascript">
               $(document).ready(function(){
 
                    function showComment(){
                      $.ajax({
                        type:"post",
                        url:"process.php",
                        data:"action=showcomment",
                        success:function(data){
                             $("#comment").html(data);
                        }
                      });
                    }
 
                    showComment();
 
 
                    $("#name").keyup(function(e){

                        if(e.keyCode==13){
 
                          var name=$("#name").val();
                        
                          $.ajax({
                              type:"post",
                              url:"process.php",
                              data:"name="+name+"&action=addcomment",
                              success:function(data){
                                showComment();
                                  
                              }
 
                          });
                        }
 
                    });
               });
       </script>
   </head>
 
   <body>
        <form id="load">
               name : <input type="text" name="name" id="name"/>
               </br>
                    
               <div id="info" />
               <ul id="comment"></ul>
        </form>
   </body>
</html>