<?php

session_start();
session_unset();
session_destroy();

header('Location: /CHS_SES/auth-login.php');

?>