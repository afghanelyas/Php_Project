<?php

require_once('BaseSeeder.php');

class CardTableSeeder extends BaseSeeder
{

    public function run(): void
    {
        $this->pdo->query("INSERT INTO cards (title) VALUES ('First Card')");
        $this->pdo->query("INSERT INTO cards (title) VALUES ('Second Card')");
    }
}

