<?php
@include "path.php";
@include  "app/database/db.php";

@include "../../path.php";
@include  "../../app/database/db.php";


$errMsg = '';

$users = selectAll('users');


function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    if ($_SESSION['admin']) {
        header ('location: ' . BASE_URL .  'admin/post/index.php');
    }else{
        header ('location: ' . BASE_URL );
    }
}

// $users = selectAll('users');

//     userAuth($_SESSION['login']);

// КОД ДЛЯ ФОРМИ РЕГІСТРАЦІЇ
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['button-reg'])) {
  //   tt($_POST);
   //  echo "Я прийшов із форми регістрації!!!";
  //   exit();
        $admin = 0;
        $login = trim($_POST["login"]);
        $email = trim($_POST["email"]);
        $passwordF = trim($_POST["pass-first"]);
        $passwordS = trim($_POST["pass-second"]);

        if ($login === '' || $email === '' || $passwordF === '') {
            $errMsg = 'Не всі поля заповнені!!!';
        }elseif (mb_strlen($login, 'UTF-8') < 2) {
            $errMsg = "Логін повинен бути не менше 2-х символів";
        }elseif ($passwordF !== $passwordS) {
            $errMsg = "Паролі в обох полях повинні відповідати один одному";
        } else {
            $existence = selectOne('users', ['email' => $email]);
            if (@$existence['email'] === $email) {
                $errMsg = "Користувач із такою почтою уже зареєструвався!!!";
            }else{
                $pass = password_hash($passwordF , PASSWORD_DEFAULT);
                $post = [
                    'admin' => $admin,
                    'username' => $login,
                    'email' => $email,
                    'password' => $pass,
                ];
                $id = insert('users', $post);
                $user = selectOne('users', ['id' => $id]);

                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['username'];
                $_SESSION['admin'] = $user['admin'];

                if ($_SESSION['admin']) {
                    header('Location: ' . BASE_URL . "admin/post/index.php");
                }else{
                    header('Location: ' . BASE_URL);
                }
            }
        }
    } else {
    $login = "";
    $email = "";
    }

// Вхід для форми авторизації
//////////////////////////////////////////////////////////////////

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['button-log'])) {

    $admin = 0;
    $email = trim($_POST["email"]);
    $passwordF = trim($_POST["pass-first"]);

    if ($email === '' || $passwordF === '') {
        $errMsg = "Не всі поля заповнені!!!";
    } else {
        @$existence = selectOne('users', [ 'email' => $email, 'password' => $passwordF  ] );
        // if ($existence && password_verify($passwordF, $existence['password'])) {

        if ( @$existence['email'] === @$email && @$existence['password'] === @$passwordF ){
        $user = @$existence;
            // echo "Авторизировать";
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];


            if ($_SESSION['admin']) {
               header('Location: ' . BASE_URL . "/index.php");
            } else {
                header('Location: ' . BASE_URL);

            }

        } else {
            // echo "Помилка авторизації";
            $errMsg = "Почта або пароль введені не правильно!!!";
        }
    }

}else{
    $email = " ";

}


/*
if (isset($_POST["login"])) {
   // var_dump($_POST);
    tt($_POST);
    die();
}
*/

   // echo $login . $email . $password . $admin;


  // tt($post);

  //  $id = insert('users', $post);
   // echo $id;
  //  $last_row = selectOne('users', ['id' => $id]);
  //  tt($last_row);



// КОД ДЛЯ ДОБАВЛЕННЯ КОРИСТУВАЧА В АДМІНКУ

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['create-user'])) {

   // tt($_POST);
    //echo "Я прийшов із форми регістрації!!!";
 //  exit();


    $admin = 0;
    $login = trim($_POST["login"]);
    $email = trim($_POST["email"]);
    $passwordF = trim($_POST["pass-first"]);
    $passwordS = trim($_POST["pass-second"]);



    if ($login === '' || $email === '' || $passwordF === '') {
        $errMsg = 'Не всі поля заповнені!!!';
    }elseif (mb_strlen($login, 'UTF-8') < 2) {
        $errMsg = "Логін повинен бути не менше 2-х символів";
    }elseif ($passwordF !== $passwordS) {
        $errMsg = "Паролі в обох полях повинні відповідати один одному";
    } else {
       $existence = selectOne('users', ['email' => $email]);
        if (@$existence['email'] === $email) {
            $errMsg = "Користувач із такою почтою уже зареєструвався!!!";
        }else{

            $pass = password_hash($passwordF , PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];

            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);

           // userAuth($user);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];

            if ($_SESSION['admin']) {
                header('Location: ' . BASE_URL . "admin/users/create.php");
            }else{
                header('Location: ' . BASE_URL);
            }


        }
    }
} else {
    $login = "";
    $email = "";
}


////////////////////////////////////////////////////////////////////////////////////

 // Видалення користувача

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete ("users", $id);
    header('Location: ' . BASE_URL .  "admin/users/index.php");
}




/////////////////////////////////////////////////////////////////



// Редактування  UPDATE  USERS THROW ADMIN

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['edit_id'])) {

    $user = selectOne('users', ['id' =>$_GET['edit_id']]);


    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];

}


      // tt($_POST);
   // tt($user['id']);
 //   exit();


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update-user'])) {


    // tt($_POST);
    // echo "Я прийшов із форми регістрації!!!";
    // exit();
    $id = @$_POST['id'];
    $email = trim($_POST["email"]);
    $login = trim($_POST["login"]);
    $passwordF = trim($_POST["pass-first"]);
    $passwordS = trim($_POST["pass-second"]);

   // $admin = isset($_POST["admin"]) !== null ? 1 : 0;
    $admin = isset($_POST["admin"]) ? 1 : 0;



    if ($email === '' || $login === '') {
        array_push($errMsg,  'Не всі поля заповнені!!!');
    }elseif (mb_strlen($login, 'UTF-8') < 2) {
        array_push($errMsg,  "Логін повинен бути не менше 2-х символів");
    } elseif ($passwordF !== $passwordS) {
        $errMsg = "Паролі в обох полях повинні відповідати один одному";
    }else {
        $pass = password_hash($passwordF , PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
            'email' => $email,
            'password' => $pass
        ];




             // tt($user);

        $user = update('users', $id, $user);
        header('Location: ' . BASE_URL .  "admin/users/index.php");

    }

} else {
   $login = '';
   $email = '';
}



/*

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('posts', $id, ["status" => $publish]);

    header('Location: ' . BASE_URL .  "admin/posts/index.php");
    exit();
}


*/