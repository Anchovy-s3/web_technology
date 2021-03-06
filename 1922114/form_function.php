<?php
  include('rank_function.php');
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>result</title>
    <link rel="stylesheet" href="styleseet_3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-left">
          <a href="../index.html"><img class="logo" src="svg/logo2.svg"></a>
        </div>
      </div>
    </header>
    <div class="result">
      <?php
      //投票データ読み込み
        if(($file = fopen("vote.txt", "r")) != false){
          fscanf($file , "%d,%d,%d,%d,%d,",$ch, $fire, $ie, $safari, $other );
      //受信データを各ブラウザと照合しパラメータ加算
          switch ($_POST['browser']) {
            case 1:
              $ch ++;
            //  echo "chrome";
              break;
            case 2:
              $fire ++;
              break;
            case 3:
              $ie ++;
              break;
            case 4:
              $safari ++;
              break;
            case 5:
              $other ++;
              break;
          }
          //格納待ちデータ作成
          $text = "{$ch},{$fire},{$ie},{$safari},{$other}";
          fclose($file);
          $file = fopen("vote.txt", "w");
          rewind($file);
          //データ格納
          fwrite($file, $text);
          //クローズ
          fclose($file);
        }
        //投票結果表示
        //echo $text;
        //echo "ch{$ch} fire{$fire} ie{$ie} safari{$safari} other{$other}";
        ///////////////////////////////////////////////////////
        //接続元IPアドレス記録用
        //ip.txtの内容をすべて取得
        if ($_POST['browser'] != NULL) {
          $ips = file_get_contents('ip.txt');
          //取得内容に現在のipを追加
          $ips = "{$ips},{$_SERVER["REMOTE_ADDR"]}";
          //ipリストを書き込みモードで開く
          $ipfile = fopen("ip.txt", "w");
          //追加したデータを書き込む
          fwrite($ipfile,$ips);
          //クローズ
          fclose($ipfile);
          //echo $ips;
        }

       ?>
       <div class="contents">
         <div class="contents-top">
           <h1>Result</h1>
         </div>
       <div class="canvas_holder">
         <canvas id="myChart"></canvas>
       </div>

       <script>
       new Chart(document.getElementById("myChart"), {
       type: "doughnut",
       data: {
       labels: ["<?php echo rank(1,1) ?>", "<?php echo rank(2,1) ?>", "<?php echo rank(3,1) ?>", "<?php echo rank(4,1) ?>", "<?php echo rank(5,1) ?>"],
       datasets: [
        {
          data: [<?php echo rank(1,0)?>, <?php echo rank(2,0)?>, <?php echo rank(3,0)?>, <?php echo rank(4,0)?>, <?php echo rank(5,0)?>],
          backgroundColor: [
            "<?php echo rank(1,2)?>",
            "<?php echo rank(2,2)?>",
            "<?php echo rank(3,2)?>",
            "<?php echo rank(4,2)?>",
            "<?php echo rank(5,2)?>",
          ]
        }
       ]
       }
       });
       </script>
      <div class="links">
        <form action="verify_reset.php" method="post">
          <input type="image" src="svg/reset.svg" name="cont_reset">

        </form>
        <a class="top-link" href="1922114_2.php">
          <p><img src="svg/top_black.svg"></p>
        </a>
      </div>
      </div>
    </div>
  </body>
</html>
