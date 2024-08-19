<?php
require 'bootstrap.php';
use Src\TableGateways\TaskGateway;

$taskGateway = new TaskGateway($dbConnection);

$result = $taskGateway->findAll();

var_dump($result);