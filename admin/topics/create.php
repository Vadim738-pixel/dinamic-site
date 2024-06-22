<?php

//session_start();

include "../../path.php";
include "../../app/controllers/topics.php";

?>


<!doctype html>
<div lang="en">
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
                    <a href="<?php echo BASE_URL . "admin/topics/create.php"?>"  class="col-3 btn-success">Створити</a>
                    <span class="col-1"></span>
                    <a href="<?php echo BASE_URL . "admin/topics/index.php"?>"  class="col-3 btn-warning">Управління</a>
                </div>

                <h2>Створити категорію</h2>


                <div class="row add-post" >
                    <form action="create.php" method ="post">

                    <div class="col" >
                        <p style=" color: red"><?=@$errMsg?></p>
                    </div>

                        <input name="id" value="<?= $id; ?>" type="hidden">

                        <div class = "col-14">
                            <input name="name" value="<?= @$name; ?>" type="text" class="form-control" placeholder = "Ім'я категорії" aria-label="Ім'я категорії">
                        </div>

                        <div class="col-8>
                 <label for= " content " class = "form-label" >Описання категорії</div></label>
                <textarea id="editor"  name="description" class="form-control" id="content" rows="6"><?=@$description?></textarea>
            </div>

            <div class="formula">
                <div class="col">
                    <button name="topic-create" class="btn btn-primary" type="submit">Створити категорію</button>
                </div>
            </div>
            </form>

        </div>

          </div>
     </div>
  </div>
</div>





<?php include ("../../app/include/footer.php") ?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script src="../../assets/js"></script>
</body>
</html>

