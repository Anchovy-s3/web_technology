
<?php
  function rank($rank, $cont){
      if(($file = fopen("vote.txt", "r")) != false){
      fscanf($file , "%d,%d,%d,%d,%d,",$ch, $fire, $ie, $safari, $other );
      //echo "{$rank}位の{$cont}を出力します";
      //echo "<br>";
      //初期化
      for ($i=1; $i <= 5; $i++) {
        //echo "初期化i{$i}回目のループ";
        //echo "<br>";
        $no{$i}["time"] = 0;
      }
      $br[0] = $ch;
      //echo $ch;
      //echo "<br>";
      //echo $br[0];
      //echo "<br>";
      $br[1] = $fire;
      //echo $fire;
      //echo "<br>";
    //  echo $br[1];
      //echo "<br>";
      $br[2] = $ie;
      //echo $ie;
      //echo "<br>";
      //echo $br[2];
      //echo "<br>";
      $br[3] = $safari;
      //echo $safari;
      //echo "<br>";
      //echo $br[3];
      //echo "<br>";
      $br[4] = $other;
      //echo $other;
      //echo "<br>";
      //echo $br[4];
      //echo "<br>";
      $brn[0] = "Chrome";
      //echo $brn[0];
      //echo "<br>";
      $brn[1] = "FireFox";
    //  echo $brn[1];
      //echo "<br>";
      $brn[2] = "IE";
      //echo $brn[2];
      //echo "<br>";
      $brn[3] = "Safari";
      //echo $brn[3];
      //echo "<br>";
      $brn[4] = "Other";
      //echo $brn[4];
    //  echo "<br>";
      //順位i browser no j
      //順位分け
      $brc[0] = "rgba(255, 205, 85, 0.65)"; //chrome
      $brc[1] = "rgba(235, 141, 54, 0.65)"; //Firefox
      $brc[2] = "rgba(70, 89, 255, 0.65)";  //IE
      $brc[3] = "rgba(59, 149, 255, 0.65)"; //Safari
      $brc[4] = "rgba(255, 85, 238, 0.65)"; //Other
      for ($i=1; $i <= 5 ; $i++) {
        //echo "順位分けループ{$i}回目";
        //echo "<br>";
        for ($j=0; $j <= 4; $j++) {
          //echo "値更新{$j}回目";
          //echo "<br>";
          //echo $brn[j];
        //  echo "br{$br[$j]}回";
          //echo "<br>";
          if ($no{$i}["time"] < $br[$j]) {
            $no{$i}["time"] = $br[$j];
            $no{$i}["name"] = $brn[$j];
            $no{$i}["color"] = $brc[$j];
            }
          }
          //echo "{$i}位{$no{$i}["name"]} {$no{$i}["time"]}票";
          //echo "<br>";
          //echo 'あ'.$no{$i}["name"].'い';
          //echo "<br>";
          //i位だったものを除外する
          switch ($no{$i}['name']) {
            case 'Chrome':
              $br[0] = 0;
              break;
            case 'FireFox':
              $br[1] = 0;
              //echo "fire削除";
              break;
            case 'IE':
              $br[2] = 0;
              break;
            case 'Safari':
              $br[3] = 0;
              break;
            case 'Other':
              $br[4] = 0;
              break;
          }
      }
      //順位に応じた戻り値
      if ($cont == 0) {
        $ret = $no{$rank}["time"];
        //echo "戻り{$ret}回です";
      }else if ($cont == 1) {
        $ret = $no{$rank}["name"];
        //echo "戻り{$ret}です";
      }else if ($cont == 2) {
        $ret = $no{$rank}["color"];
      }else{
        $ret = "error";
      }
          return $ret;




      }else {
        echo "file_open_error";
      }
    }
    ////function rank 終了////////
 ?>
