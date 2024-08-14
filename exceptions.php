<?php

function add($one, $two)
{
    return $one + $two;
}

try {
    add(1, 'two');
} catch (\Throwable $th) {
    'what are you doing';
}