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
        (1, 'support', 'donaled', 'could', "2 hours"),
        (2, 'styling', 'Laios', 'sould', "full day"),
        (3, 'header', 'Shinko', 'would', "half a day"),
        (4, 'payment', 'Maria', 'must', "2 days");
EOS;

try {
    $createTable = $dbConnection->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}
