<?php

//session_start();

include "../../path.php";

include "../../app/controllers/posts.php";


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

    <link rel="stylesheet" href="../../assets/CSS/admin.css">

    <title>My Blog!!!</title>
</head>

<body>
<?php include ('../../path.php')?>

<?php include ("../../app/include/header-admin.php") ?>

<div class="container">


        <div class="row">
        <?php include ("../../app/include/sidebar-admin.php") ?>

        <div class="posts col-9">

            <div class="button row">
                <a href="<?php echo BASE_URL . "admin/posts/create.php"?>"  class="col-3 btn-success">Створити</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php"?>"  class="col-3 btn-warning">Управління</a>
            </div>


                <h2>Редактування запису</h2>

            <div class="row add-post">

                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вивід масива із помилками -->
                    <?php @include "../../app/helps/errorInfo/.php "; ?>

                </div>

                <form  class="formula" action="edit.php" method="post" enctype="multipart/form-data">


                        <input  type="hidden"  name="id" value="<?=$id; ?>">

                    <div class = "col-14">
                        <input value="<?=$title; ?>" name="title" type="text" class="form-control" placeholder = "Title" aria-label="Назва статті">
                    </div>

                    <div class="col>

                     <label for="editor" class form-label">Зміст запису</label>
                    <textarea name="content" id="editor" class="form-control" id="editor" rows="10"><?=$content; ?></textarea>
            </div>

            <div class="input-group">
                <input name="img" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
            </div>
            <select name="topic" class="form-select mb-2" aria-label="Default select example">


                <?php foreach ($topics as $key => $topic): ?>
                    <option value = "<?=$key + 1?>" > <?=$topic['name'];?> </option>
                <?php endforeach; ?>
            </select>


            <div class="col col-6">
                <?php if (empty($publish) && $publish == 0): ?>
                <input name="publish" type="checkbox" class="form-check-input" value="1" id="flexCheckChecked">
                <label class="form-check-label" for="FlexCheckChecked">
                    Publish
                </label>
                <?php else: ?>

                <input name="publish" type="checkbox" class="form-check-input" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="FlexCheckChecked">
                    Publish
                </label>
                <?php endif; ?>
            </div>


            <div class="col">
                <button name="edit_post" class="btn btn-primary" type="submit">Зберегти запис</button>
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
