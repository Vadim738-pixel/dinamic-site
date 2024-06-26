<?php
session_start();
require "connect.php";


 function tt($value){
  echo "<pre>";
  print_r($value);
   echo "</pre>";
   exit();
 }


 function dbCheckError($query)
 {
     $errInfo = $query->errorInfo();

     if ($errInfo[0] !== PDO::ERR_NONE) {
         echo $errInfo[2];
         exit();
     }
     return true;
 }
 // Запит на отримання данних з однієї таблиці
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

  // tt($sql);
 //  exit();

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

/*
$params = [
    'admin' => 1,
    'username' => 'Some'
];

tt(selectAll("users"));
*/

// Запит на отримання одного рядка з таблиці
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

 //  tt($sql);
 // exit();

   // $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    @$query->execute();
    dbCheckError($query);
    return $query->fetch();
}

/*

  $params = [
      'id'=> 3
  ];

   tt(selectOne("users", $params));

*/


// Запис в таблицю БД
function  insert($table, $params ){
    global $pdo;
    // INSERT INTO `users` (admin, username, email, password ) VALUES ( '1', 'John', 'John@amail', '7777777');
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'" ;
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";



//tt($sql);
//exit();


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

/*
$arrData = [
  //  'id' => '14',
    'admin' => '1',
    'username' => 'Djusling',
   'email' => 'Djusling@email.com',
   'password' => '301040',
  // 'created' => '2024-01-07 00:00:00'
    //'created' => date('Y-m-d H:i:s')
];

insert('users', $arrData);

*/

// Обнолвлення рядка в таблиці
function  update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
           $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }

        $i++;
    }

   //  $sql = "UPDATE $table SET $str WHERE id = $id";
    $sql = "UPDATE $table SET $str WHERE id =  $id";

    // tt($sql);
  //   exit();

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

/*

$param = [
    "admin" => '1',
   "password" => '333',
   // "email" => 'rr@gmail.com'
];

update ('users', 5, $param);

*/


// ФУНКЦІЯ ВИДАЛЕННЯ РЯДКА ІЗ ТАБЛИЦІ
function  delete($table, $id ){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id =" . $id;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

/*
delete('users', 8);
*/





function selectAllFromPostWithUsers($table1, $table2) {
    global $pdo;

    $sql = "SELECT
         t1.id,
         t1.titel,
         t1.img,
         t1.content,
         t1.status,
         t1.id_topic,
         t1.created_date,
         t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id ";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Вибірка записів (posts) із автором на головну




function selectAllFromPostWithUsersOnIndex($table1, $table2) {
    global $pdo;

       $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 ";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Вибірка записів (posts) із автором на головну

/*
function selectAllFromPostWithUsersOnIndex($table1, $table2, $limit, $offset) {
    global $pdo;


    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1 LIMIT $limit OFFSET $offset";


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

*/

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Пошук по заголовкам та змісту (звичайний, та простий)

function searchInTitleAndContent($text, $table1, $table2) {
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;

    $sql = "SELECT 
    p.*, u.username 
    FROM $table1 AS p 
    JOIN $table2 AS u 
    ON p.id_user = u.id 
    WHERE p.status = 1 
    AND p.titel LIKE '%$text%' OR p.content LIKE '%$text%'";


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}







// Вибірка запису (posts) з автором для Single.php
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id) {
    global $pdo;

    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id = 1 ";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}





function selectTopTopicFromPostOnIndex($table1) {
    global $pdo;

    $sql = "SELECT * FROM $table1 WHERE id_topic = 2";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// ПАГИНАЦИЯ

/*
function countRow($table) {
    global $pdo;

    $sql = "SELECT COUNT(*) FROM $table WHERE  'status' = 1 " ;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}

*/


function countRow($table) {
    global $pdo;

   // $sql = "SELECT COUNT(*) FROM $table WHERE  'status' = 1 " ;

    $sql = "SELECT COUNT(*) FROM $table WHERE  'status' = 0 " ;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}



/*
$sql = "SELECT * FROM users";


 $query = $pdo->prepare($sql);
 $query->execute();
 $query = $query->errorInfo();

 if ($errInfo[0] !== PDO::ERR_NONE) {
     echo $errInfo[2];
     exit();
 }

 $date = $query->fetch();
 tt($date);    */



/*
$sth = $pdo->prepare("SELECT * FROM users");
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
print_r($result);
die();
*/



