<?php

  //ip.txt を参照し、該当なしの場合true 該当する場合 falseを返す.
  function ip_check($ip){
    $data = file("ip.txt");
    $ips = array();
    foreach ($data as $row) {
      $params = explode(",", $row);
      $ips[$params[0]] = $params[1];
    }
    if (in_array($_SERVER["REMOTE_ADDR"], $ips)){
      $ans = false;
      return $ans;
    }else{
      $ans = true;
      return $ans;
    }
  }

  session_start();
  if(empty($_SESSION["count"])){
    $_SESSION["count"] = 1;
  }else{
    $_SESSION["count"]++;
  }
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>
    1922114 web page
  </title>
  <link rel="stylesheet" href="styleseet_2.css">
  <link rel="apple-touch-icon" sizes="57x57" href="ico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="ico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="ico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="ico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="ico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="ico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="ico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="ico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="ico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="ico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="ico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="ico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="ico/favicon-16x16.png">
  <link rel="manifest" href="ico/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="ico/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>

<body>


  <header>
    <div class="container">
      <div class="header-left">
        <a href="../index.html"><img class="logo" src="svg/logo2.svg"></a>
      </div>
      <div class="header-right">
        <nav>
          <ul class="right">
            <li><a href="#upload">UPLOAD.</a></li>
            <li><a href="#ques">QUESTIONNAIRE.</a></li>
            <li><a href="#contact">CONTACT.</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <div class="main" id="main">
    <div class="top-wrapper">
      <h1>Web Technology</h1>
      <div class="top_logo">
        <!--<img src="svg/top_logo.svg">-->
      </div>
      <p>PHP Script Page
      <br>
      You visited this page <?php echo $_SESSION["count"] ?> time.</p>
      <!-- top-link はトップページ-->
        <a class="top-link" href="1922114.php">
          <p><img src="svg/link_04.svg"></p>
        </a>
        <a class="section-link" href="#upload">
          <p><img src="svg/link_02.svg"></p>
        </a>
    </div>
  </div>
  <section class="upload" id="upload">
    <div class="upload-logo">
      <h1>About This Page.</h1>
    </div>
    <div class="upload-contents">
      <?php
      /*echo rank(1,0);*/
       ?>
      <p>このページでは、1st sectionでセッションを使い訪問回数を表示しています。</p>
      <p>次に Questionnaire では使用しているブラウザについてのアンケートを設置しています</p>
      <p>このアンケートですが同一IPアドレスからの投票を一度のみに制限しています</p>
      <p>グローバルIPをテキストファイルに保存しているだけですのでセキュリティが気になる方は投票をお控えください</p>
      <p>投票済みのIPアドレスから再度アクセスがあった場合は直接投票結果ページへのリンクが表示されるようになっています</p>
    </div>
    <a class="section-link" href="#ques">
      <p><img src="svg/link_03.svg"></p>
    </a>
  </section>
  <section class="ques" id="ques">
    <div class="ques">
    <div class="ques-logo">
      <h1>Questionnaire.</h1>
    </div>
    <div class="ques-contents">
      <div class="anq-form">
        <form class="browser" action="form_function.php" method="post">
          <?php

            if (ip_check($_SERVER["REMOTE_ADDR"]) == false) {

              echo '
              <div class = "done">

              <p>すでにこのIPアドレスからは投票済みです</p>
              <br>
              <a class="resultpage" href="form_function.php">
                <p><img src="svg/result.svg"></p>
              </a>
              </div>';


            }else if (ip_check($_SERVER["REMOTE_ADDR"]) == true) {
            //  echo "<p>{$_SERVER["REMOTE_ADDR"]} からアクセス</p>";
              $browsers = array(1 => 'chrome', 2 => 'firefox', 3 => 'IE', 4 => 'safari', 5 => 'other');
              foreach($browsers as $key => $value) {
                echo '
                <div class ="radio">
                <ul>
                    <li>
                      <input checked type="radio" name="browser" value="'.
                      $key . '">
                      <label>'  . $value . '</label>
                      <div class="bullet">
                        <div class="line zero"></div>
                        <div class="line one"></div>
                        <div class="line two"></div>
                        <div class="line three"></div>
                        <div class="line four"></div>
                        <div class="line five"></div>
                        <div class="line six"></div>
                        <div class="line seven"></div>
                      </div>
                    </li>
                  </ul>
                  </div>
                ';
              }
              echo
              '<div class = "sent">
                  <input type="image" src="svg/sent.svg" alt="Sent">
               </div>';
            }else{
              echo "error";
            }


            ?>
        </form>
      </div>
      <div class="anq-intro">
        <p>あなたが普段利用しているブラウザは何ですか?</p>
        <p>左の解答欄からご回答ください。</p>
        <p>同一のIPアドレスにつき一度のみ回答いただけます。</p>
        <?php
          echo "<p>Access From:{$_SERVER["REMOTE_ADDR"]}</p>";

        ?>
      </div>
    </div>
    <a class="section-link" href="#contact">
      <p><img src="svg/link_02.svg"></p>
    </a>
  </div>
  </section>
  <section class="contact" id="contact">
    <div class="contact-logo">
      <h1>Contact.</h1>
    </div>
    <div class="contact-contents">
      <p>Mail:s1922114@cco.kanagawa-it.ac.jp</p>
    </div>
    <a class="section-link" href="#main">
      <p><img class="head" src="svg/link_03.svg"></p>
    </a>
  </section>
</body>

</html>
