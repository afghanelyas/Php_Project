<?php

abstract class BaseMigration
{

    public function __construct(protected \PDO $pdo)
    {
        //
    }

    abstract public function up(): void;

    abstract public function down(): self;

    public function migrate(): void
    {
        $this->down()->up();

        echo get_class($this)." Migration completed successfully.\n";
    }
}