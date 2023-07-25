<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\useController;

Route::view("/form","form")->name("form.view");
Route::get("/",[StudentController::class,"display"])->name("home");
Route::post("/addUser",[StudentController::class,"addUser"])->name("addUser.view");
Route::post("/editUser/{id}",[StudentController::class,"editUser"])->name("editUser.view");
Route::get("/edit/{id}",[StudentController::class,"edit"])->name("edit.view");
Route::get("/delete/{id}",[StudentController::class,"delete"])->name("delete.view");
Route::post("/search",[StudentController::class,"search"])->name("search.view");
Route::get("/search",[StudentController::class,"search"])->name("search.view");