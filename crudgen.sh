#!/bin/env sh
php artisan migrate:refresh
vendor/bin/propel database:reverse "mysql:host=127.0.0.1;dbname=cerodb;user=root;password=" --database-name=cerodb --output-dir=database/tmp
php app/schemaparser.php
vendor/bin/propel model:build --platform="mysql" --config-dir="config" --output-dir="database/generated-classes" --schema-dir="database"

