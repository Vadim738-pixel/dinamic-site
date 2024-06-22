
<?php include ("path.php");
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

    <link rel="stylesheet" href="./assets/CSS/style.css">

    <title>My Blog!!!</title>
</head>
<body>

<?php include ("app/include/header.php") ?>



<div class="container">
    <div class="content row">

        <div class="main-content col-md-9 col-12">
            <h2>Останні публікації про мистецтво та скульптуру</h2>
            <div class="single-post">
                <div class="img col-12">
                    <img src="assets/Image/IMG_20240426_145721.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="info">
                    <i class="far fa-user"> Джус Юлія Іванівна </i>
                    <i class="far fa-calendar">   Вер 13, 2023  </i>
                    </div>

                <div class="single-post_text col-12">
                    <p>Кожен елемент твору митця складається з трьох ліній, які перетинаються між собою утворюючи об’ємне перехрестя.

                        "Хрест один самих древніх символвів. <a href="" >Символізує</a> постійний перетин, думок, подій та їх взаємозв’язок, – пояснює Василь.

                        Може вказувати на місцеперебування речі, бути позначкою власності, табу або оберегом. Світло символізує початок, зародження".

                        Дуже нагальною для митців є тема землі, миру та гармонії.

                        Землі, як організму, що здатний відтворювати нове та поглинати віджиле, що здатен зберігати та проводити селекцію, "сортуючи" в пакунку своїх надр.

                        Тему війни піднімає у своїй творчості Василина Буряник.

                        Її твір "Сльози твердіють, а кров не згортається" метафорично розповідає про жертовність, яку вимагає конфлікт.

                        У мистецтві Буряник загалом вражає здатність авторки балансувати на межі концептуальності та досліджень нової мови.

                        Досить часто Василина використовує для своїх робіт прості матеріали, такі як текстиль, фарби, вода, скляні куби, але вона створює за допомогою них дивовижно складний світ нової реальності.

                        Вона здатна будувати вишукані, композиції в тілі об’єкту мистецтва, нашаровуючи частини матеріалу, надаючи йому життя.

                        Її роботи приваблюють своєю тимчасовістю, динамічністю, але водночас дуже сильним посланням. Буряник піднімає такі теми, як політична стабільність, екологія, стосунки в суспільстві тощо, занурюючи глядача у світ тендітних і красивих творів.
                        Дуже цікаво працює з темою природи, та спорідненістю з нею людини, Ганна Тарадіна.

                        У роботі "Збирання гербарію" можна розгледіти дуже інтимний процес спілкування з природою, той особливий момент, коли людина звертає увагу на природні структури і починає помічати світ, у якому ми знаходимось постійно.

                        Намагаючись зберегти цей швидкоплинний момент єднання з природою, ми ховаємо його на книжкових полицях.
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
