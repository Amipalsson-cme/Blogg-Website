<?php
     session_start();
     
 $title ='';
 $content='';
 $author='';
 $error ='';
 $msg ='';

 if (isset($_POST['submit'])){    
  $title   = trim($_POST ['title']);
  $content = trim($_POST ['content']);
  $author  = trim($_POST ['author']);
  if (empty($title)) {
    $error .= '<div class="alert alert-danger">Title is required</div>';
}
if (empty($content)) {
    $error .= '<div class="alert alert-danger">Text is required</div>';
}
if (empty($author)) {
    $error .= '<div class="alert alert-danger">Author is required</div>';
}

if ($error) {
    $msg = "<ul class='error'>{$error}</ul>";
} 


if (empty($error)) {
     try{
$sql = " INSERT INTO posts ( title,content,author)
VALUES (:title ,:content,:author)";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':content', $content);
$stmt->bindValue(':author', $author);
$result = $stmt->execute(); 
} catch(\PDOException $e) {
throw new \PDOException($e->getMessage(), (int) $e->getCode());
}


    if ($result) {
        $title='';
        $content='';
        $author='';
        $msg = '<div class="alert alert-success">Your post is added</div>';
    } else {
        $msg = '<div class="error_msg">Submitting yous post failed!</div>';
    }
}

}

?>


<form method="post">
<?=$msg?>

<div class="form-group">
  <label class="col-form-label col-form-label-sm" for="inputSmall">Title</label>
 <input class="form-control form-control-sm" type="text" name="title" placeholder="" id="title" value="<?=htmlentities($title)?>">
 
</div>

<div class="form-group">
     <label class="col-form-label col-form-label-sm" for="inputSmall">Add new post</label>
      <input class="form-control" id="content" name="content" type="text" value="<?=htmlentities($content)?>"></input>
    </div>

<div class="form-group">
  <label class="col-form-label col-form-label-sm" for="inputSmall">Author</label>
  <input class="form-control form-control-sm" type="text" name="author" placeholder="" id="author" value="<?=htmlentities($author)?>">
</div>

  <input class="btn btn-primary" type="submit"  name="submit" value="Submit">
</form>




