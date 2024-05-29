<?php
session_start();
session_destroy();
header("Location: index1.php"); // or index1.html if your main file is HTML
exit;
?>