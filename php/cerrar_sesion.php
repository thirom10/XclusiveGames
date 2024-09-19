<?php
session_start();
session_destroy();
header("Location: ../paginas/home.php");
?>
