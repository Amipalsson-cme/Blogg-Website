<?php include('config.php')?>
<!---includes header----->
<?php include('../complete-blog/includes/head.php')?>
</head>
<body>
<div class ="container">
<!---navbar---->
<?php include('../complete-blog/includes/navbar.php') ?>
<!---page content-->
<hr>
<?php

$id = $_GET['id'];
$sql = 'SELECT * FROM posts WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id ]);
$posts = $statement->fetch(PDO::FETCH_ASSOC);

if($posts === false){
    echo $id . ' not found!';

} else{
  
    echo "<ul>";  
    echo "<li><h3>{$posts ['title']}</h3></li>";
    echo "<li>{$posts['content']}" . "<br>";
    echo "<u><i>{$posts ['author']}</i></u>" ."<br>";
    echo  $posts ['published_date'] . "<br>";
    echo "</li>";
    echo "<hr>";
    echo "</ul>";
}
?>


<!----footer---->
<?php include('../complete-blog/includes/footer.php') ?>

</div>	
  
</body>
</html>
