<?php
// Session
session_start();

// Login check
require_once('funcs.php');
loginCheck();

// DB接続
$pdo = db_conn();

// SELECT
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

// 実行
$status = $stmt->execute();

// データ表示
$view='';

if($status == false){
    $error = $stmt -> errorInfo();
    exit('ErrorQuery:'. $error[2]);
} else{
    while( $result = $stmt -> fetch(PDO::FETCH_ASSOC)){
        $view .= 
        '<div class="card">
            <div class="result">
                <div class="left">
                    <ul>
                        <li>Book Title</li>
                        <li>Date</li>
                        <li>URL</li>
                        <li>Comment</li>
                    </ul>

                </div>

                <div class="right">
                    <ul>
                        <li>';
                        
                        $view .= $result['title'];
                        $view .= '</li><li>';
                        $view .= $result['date'];
                        $view .= '</li><li>';
                        $view .= $result['url'];
                        $view .= '</li><li>';
                        $view .= $result['comment'];
                        $view .= '
                        </li>
                    </ul>
                </div>
            </div>

            <div class="modify">
                <div class="edit">
                    <a href = "detail.php?id=';

                    $view .= $result['id'];
                    $view .= '">編集</a>
                </div>

                <div class="delete">
                    <a href = "delete.php?id=';
                    $view .= $result['id'];
                    $view .= '">削除</a>
                </div>';

                
            $view .='</div>

            
        </div>';
    };
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
                <div class="nav-bar">
                    <div class="display-name"><?= $_SESSION['name'] ?> さん</div>
 
                    <div class="logout"><a href="logout.php">Logout</a>  </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- タイトル -->
    <section>
        <div class="title-container">
            <div class="left">
                YOUR <span>BOOK</span> <br> 
                LIST IS HERE.<br>
                <br>
                register( ' My favorite book<span id="typing">|</span>' );
            </div>
            <div class="right">
                                                              ■■■■■■■■                      <br>
                                                           ■■■■■■■■■■■■■                    <br>
                                                         ■■■■■■■■■■■■■■■■■■                 <br>
                                                      ■■■■■■■■■■■■■■■■■■■■■■■               <br>
                                                    ■■■■■■■■■■■■■■■■■■■■■■■■■■■             <br>
                                                 ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■          <br>
                                               ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■        <br>
                                            ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■     <br>
                                          ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■   <br>
                                       ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ <br>
                                     ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■<br>
                                  ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■<br>
                                ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■<br>
                              ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■<br>
                             ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■   ■■■<br>
                            ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■     ■■■<br>
                            ■■■  ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■        ■■■<br>
                            ■■■    ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■          ■■■<br>
                            ■■■       ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■             ■■■<br>
                            ■■■         ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■               ■■■<br>
                            ■■■            ■■■■■■■■■■■■■■■■■■■■■■■■■■■■                  ■■■<br>
                            ■■■              ■■■■■■■■■■■■■■■■■■■■■■■■                   ■■■■<br>
                            ■■■                 ■■■■■■■■■■■■■■■■■■                   ■■■■■■■<br>
                             ■■■                  ■■■■■■■■■■■■■■                   ■■■■■■■■■<br>
                             ■■■■■                   ■■■■■■■■■                  ■■■■■■■■■■■■<br>
                             ■■■■■■■                   ■■■■                   ■■■■■■■■   ■■■<br>
                             ■■■■■■■■■■                ■■                  ■■■■■■■■■     ■■■<br>
                            ■■■ ■■■■■■■■■              ■■                ■■■■■■■■■       ■■■<br>
                            ■■■    ■■■■■■■■■           ■■             ■■■■■■■■■          ■■■<br>
                            ■■■      ■■■■■■■■■         ■■           ■■■■■■■■■            ■■■<br>
                            ■■■         ■■■■■■■■■      ■■        ■■■■■■■■■               ■■■<br>
                            ■■■           ■■■■■■■■■    ■■      ■■■■■■■■■                 ■■■<br>
                            ■■■              ■■■■■■■■  ■■   ■■■■■■■■■                   ■■■■<br>
                            ■■■                ■■■■■■■■■■ ■■■■■■■■■                   ■■■■■■<br>
                            ■■■                   ■■■■■■■■■■■■■■                   ■■■■■■■■■<br>
                            ■■■■■■                  ■■■■■■■■■■                   ■■■■■■■■■■■<br>
                             ■■■■■■■                   ■■■■                   ■■■■■■■■■  ■■■<br>
                             ■■■■■■■■■■                ■■                   ■■■■■■■■■    ■■■<br>
                            ■■■ ■■■■■■■■■              ■■                ■■■■■■■■■       ■■■<br>
                            ■■■   ■■■■■■■■■            ■■              ■■■■■■■■■         ■■■<br>
                            ■■■     ■■■■■■■■■■         ■■           ■■■■■■■■■            ■■■<br>
                            ■■■        ■■■■■■■■■       ■■         ■■■■■■■■■              ■■■<br>
                            ■■■          ■■■■■■■■■■    ■■      ■■■■■■■■■■                ■■■<br>
                            ■■■             ■■■■■■■■■  ■■    ■■■■■■■■■                   ■■■<br>
                            ■■■               ■■■■■■■■■■■ ■■■■■■■■■■                  ■■■■■■<br>
                            ■■■                  ■■■■■■■■■■■■■■■■                   ■■■■■■■ <br>
                             ■■■■                  ■■■■■■■■■■■■                  ■■■■■■■    <br>
                             ■■■■■■                   ■■■■■■                   ■■■■■■■      <br>
                               ■■■■■■■                 ■■                    ■■■■■■         <br>
                                 ■■■■■■■               ■■                 ■■■■■■■           <br>
                                    ■■■■■■             ■■               ■■■■■■              <br>
                                      ■■■■■■■          ■■            ■■■■■■■                <br>
                                         ■■■■■■        ■■          ■■■■■■                   <br>
                                           ■■■■■■■     ■■       ■■■■■■■                     <br>
                                              ■■■■■■   ■■     ■■■■■■                        <br>
                                                ■■■■■■■■■  ■■■■■■■                          <br>
                                                  ■■■■■■■■■■■■■■                            <br>
                                                     ■■■■■■■■                               <br>
                                                       ■■■■                                 <br>
            </div>

        </div>
    </section>

    <!-- 登録フィールド -->
    <section>
    <div class="register-container">
            <div class="register-title">
                <span>Register items</span>
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
                    <form action="register.php" method="post">
                        <ul>
                            <li><input type="text" name="title" class="input-bar"></li>
                            <li><input type="text" name="url" class="input-bar"></li>
                            <li><textArea name="comment" class="input-bar input-comment"></textArea></li>
                            <li><input type="submit" value="SEND"></li>
                        </ul>
                    </form>

                </div>
            </div>

        </div>

    </section>

    <!-- 登録内容表示 -->
    <section>
        <div class="display-container">
            <div class="display-title">
                <span>Book list</span>
            </div>

            <div class="display-field">
<!-- view の表示   -->
            <?= $view?>

    </section>

    <footer>
        <div class="footer-cotainer">
            MIL projectの一環としてphp学習用に作成されたコンテンツ
        </div>
    </footer>

</body>
</html>