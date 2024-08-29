<?php

var_dump($_SESSION['user']['name']);

// session_destroy();


header("location: /account/login.php");
exit;