<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('fetch:exchange-rates')->dailyAt('05:00')->timezone('Europe/Moscow');
Schedule::command('products:update-stock')->hourly();
Schedule::command('products:updateCompositePrice')->dailyAt('00:00')->timezone('Europe/Moscow');
Schedule::command('products:updateCompositePrice')->dailyAt('12:00')->timezone('Europe/Moscow');
Schedule::command('queue:work --queue=high,default')
    ->everyFiveMinutes();
