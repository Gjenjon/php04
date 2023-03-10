<?php
// 1. POSTデータ取得
$title = $_POST['title'];
$url = $_POST['url'];
$comment = $_POST['comment'];



// 2. DB接続します
$pdo = db_conn();


//３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table( id, title, url, comment, date )
  VALUES( NULL, :title, :url, :comment, sysdate() )"
);

// 4. バインド変数を用意
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: ../index.php");
  
}
?>
