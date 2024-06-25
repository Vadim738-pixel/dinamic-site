<?php

include ("path.php") ;
include ("app/database/db.php") ;
include "app/controllers/topics.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search-term'])) {
    $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}

// $posts = selectAll('posts', ['status' => 1]);

// tt($posts);
?>


<!doctype html>
<html lang="ru">
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

    <link rel="stylesheet" href="../assets/CSS/style.css">

    <title>My Blog!!!</title>
</head>
<body>

<?php include ("app/include/header.php") ?>




<div class="container">
    <div class="content row">



        <div class="main-content col-md-9">
            <h2>Рзультат пошуку</h2>

            <?php foreach ($posts as $post): ?>

            <div class="post row">
                <div class="img col-12 col-md-4">


                    <img src="<?= BASE_URL . 'assets/images/posts/' . $post['img']; ?>" class="img-thumbnail" alt="<?=$post['titel']?>" >


                </div>

                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"> <?=substr($post['titel'], 0, 120) . '...'?></a>
                    </h3>
                    <i class="far fa-user"> <?=$post['username']; ?> </i>
                    <i class="far fa-calendar">  <?=$post['created_date']; ?> </i>
                    <p class="preview-text">

                        <?=mb_substr($post['content'], 0, 150, 'UTF-8') . '...'?>

                    </p>
                </div>
            </div>
             <?php endforeach; ?>



        </div>


    </div>

</div>

<!-- ЗАКІНЧЕННЯ БЛОКУ MAiN  -->

<?php include ("app/include/footer.php") ?>

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

