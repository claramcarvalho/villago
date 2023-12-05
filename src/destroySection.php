<?php
session_start();
echo "<div style='display:flex;justify-content:center;align-items:center;width:100%;height:100%';>";
echo "<div style='display:flex;flex-direction:column;text-align:center;color:red;height:auto;'>";
echo "<h3>See you later</h3>";
echo "<h3>".$_SESSION["NAME"]."</h3>";
echo "</div>";
echo "</div>";
echo "<script>window.opener.location.href = window.opener.location.href;setTimeout('window.close()',1000);</script>";
session_destroy();
?>
