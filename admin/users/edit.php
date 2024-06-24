<?php
// session_start();
include "../../path.php";
include "../../app/controllers/users.php";

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
<div>


    <?php include ('../../path.php')?>

    <?php include ("../../app/include/header-admin.php") ?>



    <div class="container">

        <div class="row">

            <?php include ("../../app/include/sidebar-admin.php") ?>

            <div class="posts col-9">



                <div class="button row">
                    <a href="<?php echo BASE_URL . "admin/users/create.php"?>"  class="col-3 btn-success">Створити</a>
                    <span class="col-1"></span>
                    <a href="<?php echo BASE_URL . "admin/users/index.php"?>"  class="col-3 btn-warning">Управління</a>
                </div>



                <form action="edit.php" method="post">

                    <input name="id" value="<?=@$id?>" type="hidden" >

                    <div>
                        <h2>Створення користувача</h2>
                    </div>

                    <div class="mb-12 col-12 col-md-12 err">
                        <!-- Вивід масива із помилками -->
                        <?php @include "../../app/helps/errorInfo/.php "; ?>

                    </div>

                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Логін</label>
                        <input name="login" value="<?=@$username?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Уведіть Ваш логін">
                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email:</label>
                        <input name="email" value="<?=@$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Створіть новий пароль</label>
                        <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" >
                    </div>

                    <div class="w-100"></div>

                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Будь-ласка продублюйте пароль ще раз та натисніть відіслати</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" >
                    </div>

                    <div class="w-100"></div>

                    <div class="col col-6">
                        <input name="admin" type="checkbox" value="1" class="form-check-input" id="flexCheckChecked">

                        <label class="form-check-label" for="FlexCheckChecked">
                            Адмін?
                        </label>
                    </div>

                    <div class="col">
                        <button name='update-user' class="btn btn-primary" type="submit">Обновити</button>
                    </div>

                </form>


            </div>

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

<script src="../../assets/js"></script>
</body>
</html>
