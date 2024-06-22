<?php

include ("path.php") ;
include ("app/database/db.php") ;
include "app/controllers/topics.php";


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

    <link rel="stylesheet" href="../assets/CSS/style.css">

    <title>My Blog!!!</title>
</head>
<body>

<?php include ("app/include/header.php") ?>


<!-- ПОЧАТОК БЛОКУ КАРУСЕЛІ -->
<div class="container">
    <div class="row">
        <h2 class="slider-title"> Топові публікації</h2>
        </div>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/Image/AdPage_Wallpaper2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption hack  carousel-caption d-none d-md-block">
                <h5><a href="">First slide label</a></h5>

            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/Image/AdPage_Wallpaper3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption hack carousel-caption d-none d-md-block">
                <h5><a href="">First slide label</a></h5>

            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/Image/AdPage_Wallpaper4.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption hack carousel-caption d-none d-md-block">
                <h5><a href="">First slide label</a></h5>
        </div>
    </div>

        <div class="carousel-item">
            <img src="assets/Image/AdPage_Wallpaper10.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption hack carousel-caption d-none d-md-block">
                <h5><a href="">First slide label</a></h5>
            </div>
        </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
    </div>
<!-- КІНЕЦЬ БЛОКУ КАРУСЕЛІ -->





<div class="container">
    <div class="content row">

        <div class="main-content col-md-9">
            <h2>Останні публікації</h2>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/IMG_20240426_145721.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
                </div>
            </div>





            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/IMG_20240426_145640.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
                </div>
            </div>




            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/IMG_20240426_145745.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
                </div>
            </div>






            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/AdPage_Wallpaper4.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
                </div>
            </div>








            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/AdPage_Wallpaper10.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
                </div>
            </div>







            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/AdPage_Wallpaper13.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
                </div>
            </div>




            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/Image/AdPage_Wallpaper14.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="post_text col-12 col-md-8">

                    <h3>
                        <a href="#"> Популярна стаття на тему динамічного сайту...</a>
                    </h3>
                    <i class="far fa-user"> Ім'я автора </i>
                    <i class="far fa-calendar">   Бер 11, 2023  </i>
                    <p class="preview-text">
                        Ця стаття написана про те, як наша доблесна 42 рота копає окопи!!!
                        І в цій статті ви знайдете дуже багато чого цікавого для себе!!!
                    </p>
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
                        <li><a href="#"><?=$topic['name']?></a></li>
                    <?php endforeach; ?>

                </ul>

            </div>
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

