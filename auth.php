<?php 
// PHP RELIAZADO PARA VERIFICAR SE SE LOHUEO  EN LA SESSION
   session_name('login');
   session_start();
   if(!isset($_SESSION['name'])){
    header('Location:login.php');
   }
   
 ?>