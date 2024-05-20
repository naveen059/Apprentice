<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/students', [AdminController::class, 'viewStudents'])->name('admin.students');
    Route::get('admin/students/{student}', [AdminController::class, 'showStudent'])->name('admin.students.show');
    Route::get('/inquiries', [AdminController::class, 'viewInquiries'])->name('admin.inquiries');
    Route::get('/edit-inquiry/{id}', [AdminController::class, 'editInquiry'])->name('admin.editInquiry');
    Route::post('/update-inquiry/{id}', [EnquiryController::class, 'updateInquiry'])->name('admin.updateInquiry');
    Route::post('/delete-enquiry/{id}', [AdminController::class, 'deleteInquiry'])->name('admin.delete.inquiry');
    Route::get('/payments', [AdminController::class, 'viewPayments'])->name('admin.payments');
    Route::post('/mark-payment-complete/{id}', [AdminController::class, 'markPaymentComplete'])->name('admin.mark.payment.complete');
    Route::get('/courses', [AdminController::class, 'viewCourses'])->name('admin.courses');
    Route::post('/payments/{payment}/approve', [AdminController::class, 'approvePayment'])->name('admin.payments.approve');
    Route::post('/students/{student}/enable-access', [AdminController::class, 'enableAccess'])->name('admin.students.enableAccess');
    Route::post('/payments/{payment}/update-status', [AdminController::class, 'updateStatus'])->name('admin.payments.updateStatus');
});


Route::post('enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::prefix('student')->middleware('auth')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/register', [StudentController::class, 'showRegistrationForm'])->name('student.showRegistrationForm');
    Route::post('/register', [StudentController::class, 'register'])->name('student.register');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/create-inquiry', [StudentController::class, 'showInquiryForm'])->name('student.showInquiryForm');
    Route::post('/create-inquiry', [StudentController::class, 'createInquiry'])->name('student.createInquiry');
    Route::post('/submit-enquiry', [EnquiryController::class, 'store'])->name('student.submit_enquiry');
    Route::get('/edit-inquiry/{id}', [StudentController::class, 'editInquiry'])->name('student.editInquiry');
    Route::post('/update-inquiry/{id}', [EnquiryController::class, 'updateInquiry'])->name('student.updateInquiry');
    Route::get('/make-payment', [StudentController::class, 'showPaymentForm'])->name('student.showPaymentForm'); 
    Route::post('/make-payment', [StudentController::class, 'makePayment'])->name('student.makePayment');
    Route::get('/download-receipt', [PaymentController::class, 'downloadReceipt'])->name('payment.receipt');
});

Route::post('/submit-enquiry', [EnquiryController::class, 'submitinquiry'])->name('submit_enquiry');



  
