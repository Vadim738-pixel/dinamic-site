<?php

  @include "../../app/database/db.php";

   $errMsg = "";
   $id = "";
   $name = "";
   $description = "";
   $topics = selectAll("topics");



// КОД ДЛЯ ФОРМИ КАТЕГОРІЇ
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['topic-create'])) {


  // tt($_POST);
  //  echo "Я прийшов із форми регістрації!!!";
    //exit();

    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);


    if ($name === '' || $description === '') {
        $errMsg = 'Не всі поля заповнені!!!';
    }elseif (mb_strlen($name, 'UTF-8') < 2) {
        $errMsg = "Категорія повинна бути не менше 2-х символів";
   } else {
        $existence = selectOne('topics', ['name' => $name]);
        if (@$existence['name'] === $name) {
            $errMsg = "Така категорія уже є в базі!!!";
        }else{

            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header('Location: ' . BASE_URL .  "admin/topics/index.php");

        }
    }
} else {
    $name = "";
    $description = "";
}



// Редактування категорії

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {

    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);

    $id = @$topic['id'];
    $name = @$topic['name'];
    $description = @$topic['description'];

}


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['topic-edit'])) {

    // tt($_POST);
     // echo "Я прийшов із форми регістрації!!!";
    // exit();
    $id = @$_POST['id'];
    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);


    if ($name === '' || $description === '') {
        $errMsg = 'Не всі поля заповнені!!!';
    }elseif (mb_strlen($name, 'UTF-8') < 2) {
        $errMsg = "Категорія повинна бути не менше 2-х символів";
    } else {
            $topic = [
               // 'id' => $_SESSION ['id'],
                'name' => $name,
                'description' => $description
            ];
           //  $id = $_POST['id'];
            $topic = update('topics', $id , $topic);
            header('Location: ' . BASE_URL .  "admin/topics/index.php");

        }
    }

// Видалення категорії

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete ("topics", $id);
    header('Location: ' . BASE_URL .  "admin/topics/index.php");
}