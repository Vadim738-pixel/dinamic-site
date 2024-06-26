
<?php include ("path.php");
include ("app/database/db.php") ;
 include "app/controllers/topics.php";

// tt($_GET);

$posts = selectAllFromPostWithUsersOnIndex('posts', 'users');
// tt($posts);

 // tt($_GET[$post]);

  $post = @selectOne('posts', ['id' => $_GET['post']]);

  // tt($post);

 // $post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $_GET['post']);
 // tt($post);
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

    <link rel="stylesheet" href="./assets/CSS/style.css">

    <title>My Blog!!!</title>
</head>
<body>

<?php include ("app/include/header.php") ?>



<div class="container">
    <div class="content row">

        <div class="main-content col-md-9 col-12">

            <h2> Вивід публікацій по категоріях </h2>
            <h2>(виберіть будь-ласка категорію  в меню </h2>
            <h2>із правої сторони --> )</h2>
            <h2> А якщо хочете зареєструватися та увійти на наш сайт</h2>
            <h2>то натисніть кнопку "Вхід" в горі із правого боку</h2>



            <div class="single-post">
                <div class="img col-12">

                    <img src="<?= BASE_URL . 'assets/Image/posts/' . @$post['img']; ?>" class="img-thumbnail" alt="<?=@$post['titel']?>" >

                </div>
                <div class="info">
                    <i class="far fa-user"> <?=@$post['username'];?> </i>
                    <i class="far fa-calendar">   <?=@$post['created_date'];?>  </i>
                    </div>

                <div class="single-post_text col-12">

                    <?= @$post['content']; ?>
                </div>
            </div>



        </div>







        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Пошук</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Уведіть пошукове слово...">
                </form>
            </div>
            <div class="section topics">
                <h3>Категорії</h3>
                <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?=BASE_URL . 'category.php?id=' . $topic['id'];?>"><?=$topic['name']?></a></li>
                    <?php endforeach; ?>

                </ul>

            </div>
        </div>

    </div>

</div>

<!-- ЗАКІНЧЕННЯ БЛОКУ MAiN  -->


<!-- BEGIN FOOTER -->

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
