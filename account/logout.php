<?php

session_destroy();

header("location: /account/login.php");
exit;