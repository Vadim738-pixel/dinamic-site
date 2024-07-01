<?php
//  КОНТРОЛЕР КОМЕНТАРІВ

   @include "../../app/database/db.php";



$commentsForAdm = selectAll('comments');

@  $page = $_GET['post'];
 // tt($page);
// var_dump($_POST);

$email = " ";
$comment = " ";
$errMsg = [];
$status = 0;
$comments = [];
// $title = ' ';




// КОД ДЛЯ СТВОРЕННЯ КОМЕНТАРЯ

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['goComment'])) {
    // tt(ROOT_PATH);

   // tt($_POST);


    //////////////////////////////////////////////////////

    $email = trim($_POST["email"]);
    $comment = trim($_POST["comment"]);

   // tt($comment);


    //tt($_POST);



    if ($email === '' || $comment === '') {
        array_push($errMsg,  'Не всі поля заповнені!!!');
    }elseif (mb_strlen($comment, 'UTF-8') < 10) {
        array_push($errMsg,  "Комментар повинен бути довшим, а ніж 10 символів");
    } else {
        $users = selectOne('users', ['email' => $email]);


    $comment = [
        'status' => $status,
        'page' => $page,
        'email' => $email,
        'comment' => $comment
    ];

  //  tt($comment);


    $comment = insert('comments', $comment);
    $comments = selectOne('comments', ['page' => $page, 'status' => 1]);

}

} else {
    $email = "";
    $comment = "";
    $comments = selectAll('comments', ['page' => $page, 'status' => 1]);

}


// Видалення коментарія

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete ("comments", $id);
    header('Location: ' . BASE_URL .  "admin/comments/index.php");
}



// Статус опублікувати або зняти із публікації

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('comments', $id, ["status" => $publish]);

    header('Location: ' . BASE_URL .  "admin/comments/index.php");
    exit();
}



// Редактування постів UPDATE

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
    $oneComment = selectOne('comments', ['id' =>$_GET['id']]);
    // tt($post);
    $id = $oneComment['id'];
    $email = $oneComment['email'];
    $text1 = $oneComment['comment'];
    $pub = $oneComment['status'];

}


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit_comment'])) {
    // tt($_POST);
    // echo "Я прийшов із форми регістрації!!!";
    // exit();
    $id = $_POST['id'];
    $text = trim($_POST["content"]);
    $publish = isset($_POST["publish"]) !== null ? 1 : 0;

    //  tt($_POST);

    if ($text === '') {
        array_push($errMsg,  'Поле вводу комментарія не заповнене!!!');
    }elseif (mb_strlen($text, 'UTF-8') < 2) {
        array_push($errMsg,  "Назва статті повинена бути не менше 2-х символів");
    } else {

        $com = [
            //'id' =>['id'],
            'comment' => $text,
            'status' => $publish
        ];

        //      tt($post);

        $comment = update('comments', $id, $com);
        header('Location: ' . BASE_URL .  "admin/comments/index.php");

    }

} else {
   // $id = $_POST['id'];
    @$text = trim($_POST["comment"]);
    $publish = isset($_POST["publish"]) !== null ? 1 : 0;

}

