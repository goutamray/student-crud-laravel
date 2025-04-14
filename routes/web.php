<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


// get route
Route::get("student", [StudentController::class, "index"]) -> name('student.index');
Route::get("student-create", [StudentController::class, "create"]) -> name('student.create');
Route::get("student-show/{id}", [StudentController::class, "show"]) -> name('student.show');


// post route 
Route::post("student", [StudentController::class, "store"]) -> name('student.store');


// delete route 
Route::get("student-delete/{id}", [StudentController::class, "destroy"]) -> name('student.destroy'); 


// edit route 
Route::get("student-edit/{id}", [StudentController::class, "edit"]) -> name('student.edit'); 

// update route 
Route::put('student-update/{id}', [StudentController::class, 'update'])->name('student.update');
