<?php

    include ("app/controllers/users.php");
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

    <link rel="stylesheet" href="assets/CSS/style.css">

    <title>My Blog!!!</title>
</head>
<body>

<?php include ("app/include/header.php") ?>


<!-- END HEADER -->

<div class="container reg-form">

<form class="row justify-content-center" method="post" action="reg.php">

    <h1>Форма регістрації!!!</h1>
    <div class="mb-3 col-12 col-md-4 err">
        <p><?=$errMsg?></p>
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <label for="formGroupExampleInput" class="form-label">Ваш логін</label>
        <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Увевшть Ваш логін">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputEmail1" class="form-label">Email:</label>
        <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Уведіть будь-ласка Вашу електронну адресу.</div>
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <label for="exampleInputPassword2" class="form-label">Будь-ласка продублюйте пароль ще раз та натисніть відіслати</label>
        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
    <button  type="submit" class="btn btn-secondary" name="button-reg" >Регістрація</button>
        <a href="log.php">Вхід</a>
    </div>
</form>


</div>










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

