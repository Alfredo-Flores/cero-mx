<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/{any}', 'MainController@index')->where('any', '.*');


//TODO *CRUD Generator control separator line* (Don't remove this line!)

