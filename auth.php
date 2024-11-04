<?php 
   session_name('login');
   session_start();
   if(!isset($_SESSION['name'])){
    header('Location:login.php');
   }
   
 ?>