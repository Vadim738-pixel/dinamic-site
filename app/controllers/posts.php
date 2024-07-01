<?php

include "../../app/database/db.php";



$errMsg = [];
$id = "";
$title = "";
$content = "";
$img = "";
$topic = "";

 $topics = selectAll("topics");
 $posts = selectAll("posts");
  $postsAdm = selectAllFromPostWithUsers("posts", "users");

 // tt($postsAdm);
  // tt($posts);



// КОД ДЛЯ СТВОРЕННЯ ЗАПИСУ
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['add_post'])) {
    // tt(ROOT_PATH);
    //  tt($_FILES['img']);
    //  tt($_FILES['img']['name']);

    //////////////////////////////////////////////////////

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "-" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "/assets/images/posts//" . $imgName;
        @$result = move_uploaded_file($fileTmpName, $destination);

       // tt($result);
       //  tt($_FILES['img']);

        if (strpos($fileType, "image/jpeg") === false) {
           // die("Можна завантажити тільки зображення");
            array_push($errMsg, "Можна завантажити тільки зображення");
        } else {

            $result = move_uploaded_file( $fileTmpName, $destination);

           // tt($result);
        }

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg,  "Помилка завантаження зображення на сервер");
        }

    } else {
        array_push($errMsg,  "Помилка отримання зображення");
    }



    //////////////////////////////////////////////////


    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $topic = trim($_POST["topic"]);
  // $publish = ($_POST["publish"]);
    @$publish = isset($_POST["publish"]) ? 1 : 0;


   //tt($_POST);

    if ($title === '' || $content === '' ||  $topic === "" ) {
        array_push($errMsg,  'Не всі поля заповнені!!!');
    }elseif (mb_strlen($title, 'UTF-8') < 2) {
        array_push($errMsg,  "Назва статті повинена бути не менше 2-х символів");
    } else {

            $post = [
                'id_user' => @$_SESSION ['id'],
                'titel' => $title,
                'content' => $content,
                'img' =>$_FILES['img']['name'],
                'status' => $publish,
                'id_topic' => $topic
            ];

              //   tt($posts);


            $post = insert('posts', $post);
            $post = selectOne('posts', ['id' => $id]);
            header('Location: ' . BASE_URL .  "admin/posts/index.php");

        }

} else {
    $id = "";
    $title = "";
    $content = "";
    $publish = "";
    $topic = "";
}






// Редактування статті UPDATE

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
    $post = selectOne('posts', ['id' =>$_GET['id']]);
   // tt($post);
    $id = $post['id'];
 $title = $post['titel'];
 $content = $post['content'];
 $topic = $post['id_topic'];
    $publish = $post['status'];

}


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit_post'])) {


     // tt($_POST);
    // echo "Я прийшов із форми регістрації!!!";
    // exit();
    $id = $_POST['id'];
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $topic = trim($_POST["topic"]);
    //  $publish = ($_POST["publish"]);

    @$publish = trim($_POST["publish"]) !== null ? 1 : 0;

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "-" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $filetype = $_FILES['img']['type'];
        $destination = ROOT_PATH . "/assets/images/posts//" . $imgName;
        @$result = move_uploaded_file($fileTmpName, $destination);

        // tt($_FILES['img']);

        if (strpos(@$fileType, "image/jpeg") === false) {
            // die("Можна завантажити тільки зображення");
            array_push($errMsg, "Можна завантажити тільки зображення");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);
        }

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg,  "Помилка завантаження зображення на сервер");
        }

    } else {
        array_push($errMsg,  "Помилка отримання зображення");
    }

    //  tt($_POST);

    if ($title === '' || $content === '' ||  $topic === "" ) {
        array_push($errMsg,  'Не всі поля заповнені!!!');
    }elseif (mb_strlen($title, 'UTF-8') < 2) {
        array_push($errMsg,  "Назва статті повинена бути не менше 2-х символів");
    } else {
        $post = [
            'id_user' => @$_SESSION ['id'],
            'titel' => $title,
            'content' => $content,
            'img' =>$_FILES['img']['name'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        //      tt($post);

        $post = update('posts', $id, $post);
        header('Location: ' . BASE_URL .  "admin/posts/index.php");

    }

} else {
    @$title = $_POST["title"];
    @$content = $_POST["content"];
    $publish = isset($_POST['publish']) ? 1 : 0;
    @$topic = $_POST["id_topic"];
}




// Статус опублікувати або зняти із публікації

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('posts', $id, ["status" => $publish]);

    header('Location: ' . BASE_URL .  "admin/posts/index.php");
    exit();
}



// Видалення статті

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete ("posts", $id);
    header('Location: ' . BASE_URL .  "admin/posts/index.php");
}

