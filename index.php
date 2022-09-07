<?php

use src\Name;
use src\Person;
use src\Post;

spl_autoload_register(function ($class) {
    $links = explode('\\', $class);
    $file = str_replace('_', DIRECTORY_SEPARATOR, $class)
        . array_pop($links)
        . sprintf('%s.php', implode(DIRECTORY_SEPARATOR, array_merge($class)));

    if (file_exists($file)) {
        require $file;
    }

});

$post = new Post(
    new Person(
        new Name('Иван', 'Никитин'),
        new DateTimeImmutable()
    ),
    'Всем привет!'
);

print $post;

