<?php
// PHP RELIAZADO PARA DESTRUIR LA SESSION
session_name('login');
session_start(); 
session_destroy();
header('Location:Login.php')
?>