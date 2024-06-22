<?php session_start();

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
<body>
<?php include ('../../path.php')?>

<?php include ("../../app/include/header-admin.php") ?>

<div class="container">

        <?php include ("../../app/include/sidebar-admin.php") ?>

        <div class="posts col-9">
            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/users/create.php"?>"  class="col-3 btn-success">Створити</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php"?>"  class="col-3 btn-warning">Управління</a>
            </div>

            <h2>Користувачі</h2>

            <div class="row title-table">


                <div class="col-1">ID</div>
                <div class="col-2">Логін</div>
                <div class="col-3">Email</div>
                <div class="col-2">Роль</div>
                <div class="col-4">Управління</div>

            </div>

            <div class="row post">
                <div class="id col-1">1</div>
                <div class="title col-5">Vadim@com</div>
                <div class="author col-2">Admin</div>
                <div class="red col-2"><a href="">edit</a></div>
                <div class="del col-2"><a href="">delete</a></div>
            </div>

            <div class="row post">
                <div class="id col-1">2</div>
                <div class="title col-5">Radush@com</div>
                <div class="author col-2">User</div>
                <div class="red col-2"><a href="">edit</a></div>
                <div class="del col-2"><a href="">delete</a></div>
            </div>

            <div class="row post">
                <div class="id col-1">3</div>
                <div class="title col-5">Andryi@com</div>
                <div class="author col-2">Admin</div>
                <div class="red col-2"><a href="">edit</a></div>
                <div class="del col-2"><a href="">delete</a></div>
            </div>

            <div class="row post">
                <div class="id col-1">4</div>
                <div class="title col-5">Ivanka@com</div>
                <div class="author col-2">User</div>
                <div class="red col-2"><a href="">edit</a></div>
                <div class="del col-2"><a href="">delete</a></div>
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
</body>
</html>


