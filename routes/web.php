<?php

use Illuminate\Support\Facades\Route;
use App\Models\Test;
use Illuminate\Http\Request;

Route::get('zxc', function (Request $request) {
    $zxc = Test::find(1);
    return view('test', ['test' => $zxc]);
});
