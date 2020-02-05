<?php

Route::get('/{any}', function () {
    return view("app");
})->where('any', '.*');

//TODO *CRUD Generator control separator line* (Don't remove this line!)

