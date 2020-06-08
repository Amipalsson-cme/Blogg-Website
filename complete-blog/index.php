<?php include('config.php')?>
<!----includes header ---->
<?php include('../complete-blog/includes/head.php')?>
</head>
<body>
<div class ="container">

<!---navbar---->
<?php include('../complete-blog/includes/navbar.php') ?>
<h1>Welcome to my blog</h1>
<!---page content-->
<hr>

<?php
$sql = "SELECT *  FROM posts";
$query = $conn->prepare( $sql );
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC );        

foreach ($results as $row)
{   
    echo "<ul>";  
    
    echo "<li><h3>{$row ['title']}</h3></li>";
    echo substr($row['content'], 0, 100) . '<span class="ellipsis">...</span><a class="btn btn-primary btn-sm" href="blogs.php?id='.$row['id'].'">Read more..</a>'.'<br>';
    echo "<u><i>{$row ['author']}</i></u>" ."<br>";
    echo  $row ['published_date'] . "<br>";
    echo "</li>";
    echo "<hr>";
    echo "</ul>";
}


?>

<hr>

<!----footer---->
<?php include('../complete-blog/includes/footer.php') ?>

</div>	
  
</body>
</html>
