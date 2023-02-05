<?php

session_start();

require_once('funcs.php');

loginCheck();
// DB接続
$pdo = db_conn();

// id受け取り
$id = $_GET['id'];

// SELECT
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id;");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 実行
$status = $stmt->execute();


//データ表示
$view = '';
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    $result = $stmt->fetch();//ここを追記！！
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIL4 book table</title>

    <link rel="stylesheet" href="../scss/style.css">

</head>
<body>
    <!-- ヘッダー -->
    <header>
        <div class="header-title">
            <div class="logo">
                <img src="../img/book.png" alt="">
                <h1>MIL</h1>
            </div>

            <nav class="nav">
            </nav>
        </div>
    </header>

    <!-- タイトル -->
    <section>
        <div class="title-container">
            <div class="left">
            </div>
            <div class="right">
            </div>

        </div>
    </section>

    <!-- 登録フィールド -->
    <section>
    <div class="register-container">
            <div class="register-title">
                <span>Modify your item</span>
            </div>

            <div class="register-field">

                <div class="left">
                    <ul>
                        <li>Book Title</li>
                        <li>URL</li>
                        <li>Comment</li>
                    </ul>
                    
                </div>

                <div class="right">
                    <form action="update.php" method="post">
                        <ul>
                            <li><input type="hidden" name="id" class="input-bar" value="<?=$result['id']?>"></li>
                            <li><input type="text" name="title" class="input-bar" value="<?=$result['title']?>"></li>
                            <li><input type="text" name="url" class="input-bar" value="<?=$result['url']?>"></li>
                            <li><textArea name="comment" class="input-bar input-comment"><?=$result['comment']?></textArea></li>
                            <li><input type="submit" value="SEND"></li>
                        </ul>
                    </form>

                </div>
            </div>

        </div>

    <footer>
        <div class="footer-cotainer">
            MIL projectの一環としてphp学習用に作成されたコンテンツ
        </div>
    </footer>

</body>
</html>