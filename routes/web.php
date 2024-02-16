<?php 

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



// Public routes accessible to all users
Route::get('/', function () {
    return view('welcome');
});



    // Resourceful routes for CRUD operations
    Route::resource('student', StudentController::class);

    // Route for importing student data
    Route::post('student_import', [StudentController::class, 'import'])->name('student.import');

    // Route for exporting student data
    Route::get('student_export', [StudentController::class, 'get_student_data'])->name('student.export');



