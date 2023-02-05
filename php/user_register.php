<?php
// 
require_once('funcs.php');
$flg = $_GET['flg'];
if($flg == 1){
    $samural_alert = "登録内容を埋めてください";
    $alert = "<script type='text/javascript'>alert('". $samural_alert. "');</script>";
    echo $alert;
}elseif($flg == 2){
        $samural_alert = "既に登録されているIDです。別のIDを指定してください。";
        $alert = "<script type='text/javascript'>alert('". $samural_alert. "');</script>";
        echo $alert;
}

// DB接続
$pdo = db_conn();

// SELECT
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id;");
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 実行
// $status = $stmt->execute();

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
                <span>User</span>
            </div>

            <div class="register-field">

                <div class="left">
                    <ul>
                        <li>Name</li>
                        <li>ID</li>
                        <li>Password</li>
                    </ul>
                    
                </div>

                <div class="right">
                    <form action="register_for_user.php" method="post">
                        <ul>
                            <li><input type="text" name="name" class="input-bar"></li>
                            <li><input type="text" name="id" class="input-bar"></li>
                            <li><input type="password" name="pass" class="input-bar" id="input_pass">
                                <button id="btn_passview">≪</button>
                            </li>

                            <li><input type="submit" value="SEND"></li>
                        </ul>
                    </form>

                </div>
            </div>

        </div>

    </section>

    <footer>
        <div class="footer-cotainer">
            MIL projectの一環としてphp学習用に作成されたコンテンツ
        </div>
    </footer>


    <script>
        window.addEventListener('DOMContentLoaded', function(){

        // (1)パスワード入力欄とボタンのHTMLを取得
        let btn_passview = document.getElementById("btn_passview");
        let input_pass = document.getElementById("input_pass");

        // (2)ボタンのイベントリスナーを設定
        btn_passview.addEventListener("click", (e)=>{

            // (3)ボタンの通常の動作をキャンセル（フォーム送信をキャンセル）
            e.preventDefault();

            // (4)パスワード入力欄のtype属性を確認
            if( input_pass.type === 'password' ) {

                // (5)パスワードを表示する
                input_pass.type = 'text';
                btn_passview.textContent = '⇔';

            } else {

                // (6)パスワードを非表示にする
                input_pass.type = 'password';
                btn_passview.textContent = '⇔';
            }
        });

        });
    </script>

</body>
</html>