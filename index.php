<html>
   <head>
   <link href="css/style.css" typ="text/css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
//console log function
              function console_func(msg)
              {
                console.log(msg);
              }
 
              function showComment()
              {
                $.ajax({
                type:"post",
                url:"todo.php",
                data:"action=showcomment",
                success:function(data)
                {
                    $("#comment").html(data);
                }
                      });
              }
              showComment();
 //ajax call to submit data
              $("#load").submit(function(e) 
              {
                e.preventDefault();
                var name=$("#name").val();
                    $.ajax({
                              type:"post",
                              url:"todo.php",
                              data:"name="+name+"&action=addcomment",
                              success:function(data)
                              {
                                showComment();
                              }
 
                          });
              });
//ajax call to delete the checked items
              $("#delete").click(function()
              {
                var ids = [];
                a=0;
                $('input[name="check"]:checked').each(function()
                {
                    ids.push(this.value);
                });
                    $.ajax({
                              type:"post",
                              url:"todo.php",
                              data:"id="+ids[a]+"&action=deletecomment",
                              success:function(data)
                              {
                                console_func(ids);
                                showComment();
                              }
                          });
                        return false;
                });
//line through the checked items
              $( "#comment" ).click(function() 
                {
                  $(this).css("text-decoration", "line-through");
                  $(this).css("font-size", "20px");
                });
                    
                });
              
       </script>
</head>
 
   <body class="padding_top">
       <div class="col-md-12">
         <div class="col-md-4 "></div>
            <div class="col-md-4 border" style="background-color:#33CCCC"><div class="text-center h3 ">TO-DO</div>
                <form id="load" class="">
                    <input type="text" class="text-center form-control input-lg" name="name" id="name"/>
               </br>
               <div id="comment"></div>
               <input type="button" value="DELETE" id="delete" name="" class="btn btn-danger center-block" />

                </form>
    </div>
      <div class="col-md-4 "></div>
        </div>
   </body>
</html>