START /WAIT CMD /C php artisan migrate:refresh --seed
START /WAIT CMD /C vendor\bin\propel database:reverse "mysql:host=127.0.0.1;dbname=cerodb;user=root;password=" --database-name="cerodb" --output-dir="database/tmp"
START /WAIT CMD /C php app\schemaparser.php
START /WAIT CMD /C vendor\bin\propel model:build --platform="mysql" --config-dir="config" --output-dir="database/generated-classes"  --schema-dir="database"
START /WAIT CMD /C composer dump-autoload
