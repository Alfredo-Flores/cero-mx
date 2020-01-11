<?php

namespace App;

use MadWeb\Initializer\Contracts\Runner;

class Update
{
    public function local(Runner $run)
{
    return $run
        ->artisan('migrate:refresh')
        ->external('vendor/bin/propel', "database:reverse", "mysql:host=127.0.0.1;dbname=cerodb;user=root;password=", '--database-name="cerodb"', '--output-dir=database/tmp')
        ->external('php', 'app/schemaparser.php')
        ->external('vendor/bin/propel', 'model:build', '--platform="mysql"', '--config-dir="config"', '--output-dir="database/generated-classes"',  '--schema-dir="database"')
        ->external('ls');

}
}
