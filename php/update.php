<?php

session_start();

require_once('funcs.php');

loginCheck();

// データの受け取り
$id = $_POST['id'];
$title = $_POST['title'];
$url = $_POST['url'];
$comment = $_POST['comment'];

// DB接続
$pdo = db_conn();

// データ登録SQL
$stmt = $pdo->prepare(
    "UPDATE gs_bm_table 
    SET title = :title, url = :url, comment = :comment, date = sysdate() 
    WHERE id = :id;");

$stmt->bindValue(':title', $title, PDO::PARAM_STR);/// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':url', $url, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);// 数値の場合 PDO::PARAM_INT
$status = $stmt->execute(); //実行

//データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    header("Location: ../index.php");}

?>