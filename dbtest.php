<?php
use TableGateways\TaskGateway;

$taskGateway = new TaskGateway($dbConnection);

$result = $taskGateway->findAll();

var_dump($result);