<?php

session_destroy();
//token destroy

header("location: /account/login.php");
exit;