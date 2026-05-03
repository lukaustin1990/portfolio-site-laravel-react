<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get("/", function () {
    return view("home");
});

Route::get("/products", function () {
    return view("products");
});

Route::get("/about", function () {
    return view("about");
});

Route::get("/admin", function () {
    return view("admin.admin");
});

Route::get("/admin/products", function () {
    return view("admin.products");
});

Route::post("/login", function () {
    // Handle login logic here
    return redirect()->back();
})->name("login");

Route::post("/logout", function () {
    // Handle logout logic here
    return redirect()->back();
})->name("logout");

Route::post("/signup", [UserController::class, "signup"])->name("signup");