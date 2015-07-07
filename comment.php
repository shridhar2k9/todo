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
 
 
                    $("#button").click(function(){
 
                          var name=$("#name").val();
                        
                          $.ajax({
                              type:"post",
                              url:"process.php",
                              data:"name="+name+"&action=addcomment",
                              success:function(data){
                                showComment();
                                  
                              }
 
                          });
 
                    });
               });
       </script>
   </head>
 
   <body>
        <form>
               name : <input type="text" name="name" id="name"/>
               </br>
               <input type="button" value="Send Comment" id="button">
                
               <div id="info" />
               <ul id="comment"></ul>
        </form>
   </body>
</html>