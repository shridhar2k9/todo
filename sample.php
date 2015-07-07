<html>
    <head>
    	<title>To Do</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
        <script type='text/javascript' src='js/jquery.min.js'></script>
        <script src="js/jquery-1.10.2.js"></script>
        
         <script type="text/javascript">
               $(document).ready(function(){
 
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
 
 
                    $("#button").click(function(){
 
                          var name=$("#name").val();
                          var message=$("#message").val();
 
                          $.ajax({
                              type:"post",
                              url:"process.php",
                              data:"name="+name+"&message="+message+"&action=addcomment",
                              success:function(data){
                                showComment();
                                  
                              }
 
                          });
 
                    });
               });
       </script>
	</head>
	<body bgcolor="#008AB8">
		<h2>To Do</h2>
		<form name="checkListForm">
			<input class="checkListItem" type="text" name="checkListItem"/>
		</form>
		<div id="button">Add</div>
		<br/>
		<div class="list"></div>
      	</body>
</html>