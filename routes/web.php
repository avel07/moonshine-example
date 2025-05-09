<?php

use Illuminate\Support\Facades\Route;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('zxc', function (Request $request) {

    // $zxc = Storage::disk('minio')->put('test.txt', 'CI OK');
    // $a = Storage::disk('minio')->allFiles();
    // dump($zxc, $a);
    $zxc = Test::find(1);
    return view('test', ['test' => $zxc]);
});
