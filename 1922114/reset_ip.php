<?php
$reset = fopen("ip.txt", "w");
$reset_null = NULL;
fwrite($reset,$reset_null);
fclose($reset);
echo "reseted";
echo "<br>";
echo '
<a class="top-link" href="1922114_2.php">
  <p><img src="svg/top_black.svg"></p>
</a>'
?>
