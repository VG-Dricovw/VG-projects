<?php

if ($_SESSION['user'] ?? false) {
    header('location : ' . "index.php");
}