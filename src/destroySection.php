<?php
session_start();
session_destroy();
echo "<script>alert('You were logged out successfully');.</script>";
?>
