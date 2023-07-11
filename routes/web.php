<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Imports\ItemImport;
use App\Exports\ItemExport;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('items/import',function(Request $request){

    Excel::import(new ItemImport, $request->file('file'));
    return redirect()->back();
    
})->name('items.import');

Route::get('items/export',function(){
    return Excel::download(new ItemExport, 'items.xlsx');
})->name('items.export');
