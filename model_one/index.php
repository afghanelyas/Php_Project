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
            return $book['author'] === 'gul';
        });

require "index.view.php";



