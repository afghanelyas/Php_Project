<?php

use Core\Container;
test('It can resolve something out of the container', function () {
    // arrange
    $container = new Container();
    $container->bind('name', function () {
        return 'John Doe';
    });
    // act
    $name = $container->resolve('name');
    // assert
    expect($name)->toBe('John Doe');
});
