<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about-project', function () {
    $this->comment('Student Management System — Laravel');
})->purpose('Display a short project description');
