<?php

abstract class BaseSeeder
{

    public function __construct(protected \PDO $pdo)
    {
        //
    }

    abstract public function run(): void;

    public function call(): void
    {
        $this->run();

        echo get_class($this)." Seed completed successfully.\n";
    }
}