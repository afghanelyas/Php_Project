<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $books = [
            [
                'name' => 'computer',
                'author' => 'joma',
                'releaseYear' => 2021,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'netword',
                'author' => 'ali',
                'releaseYear' => 2011,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'database',
                'author' => 'ali',
                'releaseYear' => 2022,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'security',
                'author' => 'gul',
                'releaseYear' => 2041,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'java',
                'author' => 'gul',
                'releaseYear' => 2022,
                'purchaseUrl' => 'http://example.com'
            ]

            ];
            function filter($items , $function){

                $filterItmes = [];

                foreach($items as $item){

                    if($function($item)){

                        $filterItmes[] = $item;
                    }
                }
                return $filterItmes;
            }

            $filtereBooks = array_filter($books, function($book){

                return $book['name'] === 'databasea';
            });


    ?>

            <ul>    
               
               <?php  foreach($filtereBooks as $book) :?>

                <a href="<?php $books['purchaseUrl'] ?>">

                <li>

                    <?= $book['name'] ?>  <?= $book['releaseYear'] ?> 

                </li>

                </a>
                <?php endforeach ?>
               
            </ul>

</body>
</html> 