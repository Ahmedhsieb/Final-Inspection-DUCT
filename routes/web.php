<?php

use App\Http\Controllers\InspectionParamController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/',function ()
{
    return redirect('order');
});

//Route::post('/submit-signature', [\App\Http\Controllers\TestController::class, 'submitSignature']);

Route::resource('order', TaskController::class);
Route::get('order/trash', [TaskController::class, 'trash'])->name('order.trash');
Route::delete('order/forceDelete/{order}', [TaskController::class, 'forceDelete'])->name('order.forceDelete');
Route::post('order/restore/{order}', [TaskController::class, 'restoreData'])->name('order.restore');

Route::resource('param', InspectionParamController::class);
Route::get('param/trash', [InspectionParamController::class, 'trash'])->name('param.trash');
Route::delete('param/forceDelete/{param}', [InspectionParamController::class, 'forceDelete'])->name('param.forceDelete');
Route::post('param/restore/{param}', [InspectionParamController::class, 'restoreData'])->name('param.restore');
