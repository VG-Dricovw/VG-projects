<?php
use Pest\Support\Container;

test("it can resolve something out of the container", function () {
    //arrage
    $container = new Container;

    $container->bind("foo", fn() => 'bar');
    //act
    $result = $container->resolve('foo');
    //confirm
    expect($result)->toBe('bar');
});