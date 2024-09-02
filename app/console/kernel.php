protected function schedule(Schedule $schedule)
{
    $schedule->call('App\Http\Controllers\TempResultController@sendToSIMRS')->everyThirtyMinutes();
}