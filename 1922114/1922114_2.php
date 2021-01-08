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

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>
    1922114 web page
  </title>
  <link rel="stylesheet" href="styleseet_2.css">

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
      <p>PHP Script Page</p>
      <<!-- top-link はトップページ-->
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
      <h1>Upload.</h1>
    </div>
    <div class="upload-contents">
      <?php
      /*echo rank(1,0);*/
       ?>
      <p>これまで学んできた情報技術そしてネットワーク技術に関する基礎知識について、実践を通じて理解を深めこれらの活用や</p>
      <p>今後の展望について議論をできるようにすることを目指した授業である。</p>
      <p>具体的には、ネットワーク上のサーバとサーバ上で稼働するWebを用いたアプリケーションについて学んでいく。</p>
      <p>まずサーバを構築する基盤としてUNIX OSを導入する。</p>
      <p>そして、これまで個別に学んできたネットワーク基礎知識や原理について補足講義を含めながら、これらを活用してWWWサービスを行うためのUNIXネットワークとその設定について学ぶ。</p>
      <p>さらに、Webアプリケーション開発のためのソフトウェア技術について、PHP言語を用いながら、講義と演習を交えて実践的に学んでいく。</p>
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
