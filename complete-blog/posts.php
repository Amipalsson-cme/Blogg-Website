<?php include('config.php')?>
<!----include header---->
<?php include('../complete-blog/includes/head.php')?>

</head>
<body>
<div class ="container">

<!---navbar---->
<?php include('../complete-blog/includes/navbar.php') ?>



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
    echo "<li>{$row['content']}<li>" .'<br>';
    echo "<u><h5>{$row ['author']}</h5></u>" ."<br>";
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
