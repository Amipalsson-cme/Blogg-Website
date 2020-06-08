<?php

require 'config.php';  

include('includes/head_admin.php'); ?>
</head>
<body>

	<div class="container">
    <?php include('../admin/includes/navbar.php') ?>
    <hr>
    <h1>Update Post</h1>
    
    
		<hr>
<?php

$id = $_GET['id'];
$sql = 'SELECT * FROM posts WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id ]);
$posts = $statement->fetch(PDO::FETCH_OBJ);


if (isset ($_POST['title'])  && isset($_POST['content']) && isset($_POST['author'])) {
  $title= trim($_POST['title']);
  $content = trim($_POST['content']);
  $author =trim($_POST ['author']);

  $sql = 'UPDATE posts SET title=:title, content=:content, author=:author WHERE id=:id';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':title' => $title,':content' => $content, ':author' => $author, ':id' => $id])) {
    header("Location:dashboard.php");
  }


}

?>
<?php  include('includes/head_admin.php'); ?>
<div class="container">
<form method="post">

<div class="form-group">
  <label class="col-form-label col-form-label-sm" for="inputSmall">UpdateTitle</label>
 <input class="form-control form-control-sm" type="text" name="title" id="title" value="<?= $posts->title; ?>">
 
</div>

<div class="form-group">
      <label for="col-form-label col-form-label-sm">Update  post</label>
      <input class="form-control form-control-sm" id="content" name="content" 
      value="<?= $posts->content; ?>">
    </div>

<div class="form-group">
  <label class="col-form-label col-form-label-sm" for="inputSmall">Update Author</label>
  <input class="form-control form-control-sm" type="text" name="author"  id="author" value="<?= $posts->author; ?>">
</div>

  <input class="btn btn-primary" type="submit"  name="submit" value="Submit">
</form>
</div>
