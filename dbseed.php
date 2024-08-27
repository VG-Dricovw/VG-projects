<?php
require 'bootstrap.php';

$statement = <<<EOS
     CREATE TABLE IF NOT EXISTS tasks (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    creator VARCHAR(100) NOT NULL,
    category VARCHAR(20) DEFAULT NULL,
    Est_time VARCHAR(20) DEFAULT NULL,
    Real_time VARCHAR(20) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=INNODB;

    INSERT INTO tasks
        (id, title, creator, category, Est_time, Real_time)
    VALUES
        (1, 'support', 'donaled', 'could', '2 hours', '2 hours'),
        (2, 'styling', 'Laios', 'sould', 'full day', '2 hours'),
        (3, 'header', 'Shinko', 'would', 'half a day', '2 hours'),
        (4, 'payment', 'Maria', 'must', '2 days', '2 hours');
EOS;

try {
    $createTable = $dbConnection->exec($statement);
    var_dump('succes');
} catch (\PDOException $e) {
    exit($e->getMessage());
}
