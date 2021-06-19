<?php
include('./functions.php');
session_start();
// check_session_id();
$_SESSION= array();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
header('Location:users_login.php');
exit();