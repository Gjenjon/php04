<?php
// 1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['id'];
$lpw = $_POST['pass'];

require_once('funcs.php');

// 重複登録内容の検索
// $pdo = db_conn();
// $pre_stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid;");
// $pre_stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
// $pre_status = $pre_stmt->execute();
// $val = $pre_stmt->fetch(); 

$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid = :lid");
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);
$status = $stmt->execute();
$val = $stmt->fetch();         //1レコードだけ取得する方法

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

if( empty($name) || empty($lid) || empty($lpw) ){
  // redirect("user_register.php?flg=1");
} elseif( !empty($val['lid']) ){
  redirect("user_register.php?flg=2");
}

// // hash 
// $lpw = password_hash($lpw,PASSWORD_DEFAULT);


// //３．SQL文を用意(データ登録：INSERT)
// $stmt = $pdo->prepare(
//   "INSERT INTO gs_user_table( id, name, lid, lpw, kanri_flg, life_flg )
//   VALUES( NULL, :name, :lid, :lpw, :kanri_flg, :life_flg  )"
// );

// // 4. バインド変数を用意
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':kanri_flg', 0, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':life_flg', 0, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)


// // 5. 実行
// $status = $stmt->execute();

// // 6．データ登録処理後
// if($status==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   $error = $stmt->errorInfo();
//   exit("ErrorMassage:".$error[2]);
// }else{
//   //５．index.phpへリダイレクト
//   redirect("../index.html");
  
// }
?>
