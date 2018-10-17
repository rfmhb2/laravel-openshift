<?php



Route::get('/', function () {
    return view('welcome');
});


Route::get('health.php', function () {
    try {
        \DB::connection()->getPdo();
        return 'OK';
    } catch (\Exception $e) {
        abort(500, "Connection failed: " . $e->getMessage());
    }
});


Route::get('/{chat_id}/{text}', function ($chat_id, $text) {
    event(new App\Events\Reserved($chat_id, $text));
    return "add to queue. we will send your message soon.";
});
