<?php
header('Content-Type: text/html; charset=UTF-8');
function reset_ip(){
$reset = fopen("ip.txt", "w");
$reset_null = NULL;
fwrite($reset,$reset_null);
fclose($reset);
echo "reseted";
echo "<br>";
}
?>
<pre>
<?php
$id = $_POST["ID"];
$pass = $_POST["PW"];
if(hash("sha256", $id) == "795ad03252b51225220df1533abb4b40bfabb14ccc95fd6e87872942e1409a45" && hash("sha256", $pass) == "b63f47f926499867834f28da9a78bb733cb8c3657d224bba3552ded6aedc007c"){
  reset_ip();
}else{
  echo "Wrong Account!";
}
echo "<br>";
echo'
<a class="top-link" href="1922114_2.php">
  <p><img src="svg/top_black.svg"></p>
</a>'
?>
</pre>