<?php
// session_start();
// include "../../path.php";
include "../../app/controllers/posts.php";
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

   <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTLWILj8LyTjo7mOUStjsKC4UpQbqyi7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    -->

    <link rel="stylesheet" href="../../assets/CSS/admin.css">

    <title>My Blog!!!</title>
</head>
<body>
<?php include ('../../path.php')?>

<?php include ("../../app/include/header-admin.php") ?>

<div>

<div class="container">

    <?php include ("../../app/include/sidebar-admin.php") ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php"?>"  class="col-3 btn-success">Створити</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php"?>"  class="col-3 btn-warning">Редактувати</a>
            </div>



            <div class="row title-table">
                <h2>Управління записами</h2>
                <div class="col-1">ID</div>
                <div class="col-3">Назва</div>
                <div class="col-2">Автор</div>
                <div class="col-6">Управління</div>

             </div>

            <?php foreach ($postsAdm as $key => $post): ?>
            <div class="row post">
                <div class="id col-1"><?=@$key + 1; ?></div>
                <div class="title col-5"><?=mb_substr($post['titel'], 0, 50, 'UTF-8') . '...'?></div>
                <div class="author col-2"><?=@$post['username']?></div>
                <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">delete</a></div>
                <?php if ($post['status']): ?>
                     <div class="status col-2"> <a href="edit.php?publish=0&pub_id=<?=$post['id'];?>" >unpublish</a></div>
                <?php else: ?>
                     <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">publish</a></div>
            <?php endif; ?>
        </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>


<?php include ("../../app/include/footer.php") ?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>

