<?php  include('config.php'); ?>
<!---includes header--->
<?php  include('includes/head_admin.php'); ?>
</head>
<body>

	<div class="container">
    <!---navbar---->
    <?php include('../admin/includes/navbar.php') ?>
    <!----page content--->
    <hr>
    <h1>Welcome Admin</h1>
    <?php include('insert.php') ?>
    
		<hr>
  
  <?php
   
   $sql = "SELECT * FROM posts";
   $query = $conn->prepare( $sql );
   $query->execute();
   $results = $query->fetchAll( PDO::FETCH_ASSOC );        
 
   foreach ($results as $row)
   {   
       echo "<ul>";  
       echo "<li><h3>{$row ['title']}</h3></li>";
       echo substr($row['content'], 0, 30) . '<span class="ellipsis">...</span>
       <a class="btn btn-primary btn-sm" href="../complete-blog/blogs.php?id='.$row['id'].'">Read more..</a>'.'<br>';
       echo  "<u><i>{$row ['author']}</i></u>" ."<br>";
       echo  $row ['published_date'] . "<br>";
       echo  '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Update</a>';
       echo  '<a class="btn btn-danger remove" href="delete.php?id='.$row['id'].'" >Delete</a>';
       echo "<hr>";
       echo "</ul>";
   }
?>


        <?php include('../admin/includes/footer.php') ?>
	</div>

</body>
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("ul").attr("id");


        if(confirm('Are you sure to remove this post ?'));
        else
         return false;
        {
            $.ajax({
               url: 'delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
              
               
            });
        }
    });


</script>
</html>