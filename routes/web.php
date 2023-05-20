<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowsController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AuthController;

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
    return redirect()->route('login');
});

Route::get('/student', [StudentsController::class, 'index'])->name('student');
Route::get('/student/{sid}/edit', [StudentsController::class, 'edit'])->name('student-edit');
Route::put('/student/{sid}/edit', [StudentsController::class, 'update'])->name('student.update');
Route::delete('/student/{sid}/delete', [StudentsController::class, 'destroy'])->name('student-delete');
Route::get('/students/{sid}', [StudentsController::class, 'show'])->name('student.show');
Route::get('/student-add', [StudentsController::class, 'redirectToStudentAdd'])->name('student-add');
Route::post('/student/store', [StudentsController::class, 'store'])->name('student.store');
Route::match(['get', 'post'], '/student-add', [StudentsController::class, 'create'])->name('student.create');

/*Routes for books */
Route::get('/book', [BooksController::class, 'index'])->name('book');
Route::get('/book/{bid}/edit', [BooksController::class, 'edit'])->name('book-edit');
Route::put('/book/{bid}/edit', [BooksController::class, 'update'])->name('book.update');
Route::get('/book-add', [BooksController::class, 'redirectToStudentAdd'])->name('book-add');
Route::post('/book/store', [BooksController::class, 'store'])->name('book.store');
Route::match(['get', 'post'], '/book-add', [BooksController::class, 'create'])->name('book.create');
Route::delete('/book/{bid}/delete', [BooksController::class, 'destroy'])->name('book-delete');

/*Routes for borrows */
Route::get('/borrow', [BorrowsController::class, 'index'])->name('borrow');
Route::get('/borrows/{borrow_id}/edit', [BorrowsController::class, 'edit'])->name('borrow-edit');
Route::put('/borrow/{borrow_id}/edit', [BorrowsController::class, 'update'])->name('borrow.update');
Route::delete('/borrow/{borrow_id}/delete', [BorrowsController::class, 'destroy'])->name('borrow-delete');
Route::get('/getStudentName', [BorrowsController::class, 'getStudentName'])->name('get-student-name');
Route::post('/borrow/store', [BorrowsController::class, 'store'])->name('borrow.store');
Route::match(['get', 'post'], '/borrow-add', [BorrowsController::class, 'create'])->name('borrow.create');

/*Routes for home*/
Route::get('/home', [HomesController::class, 'index'])->name('home');

/*Routes for report */
Route::get('/report', [ReportsController::class, 'index'])->name('report');

/*Routes fot login */
Route::get('/login',  [AuthController::class, 'showLoginForm'])->name('showlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
