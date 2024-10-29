<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth')->group(function () {
    Route::get('/', [AdminController::class , 'AdminLogin'])->name('admin.login');
}); */


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/', [AdminController::class , 'AdminLogin'])->name('admin.login'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class , 'AdminDashboard'])->name('admin.dashboard');

    Route::get('admin/logout', [AdminController::class , 'AdminLogout'])->name('admin.logout');
    //profile
    Route::get('admin/profile', [AdminController::class , 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile_update', [AdminController::class , 'AdminProfileUpdate'])->name('admin.profile_update');
    Route::get('admin/change_password', [AdminController::class , 'AdminChangePassword'])->name('admin.change_password');
    Route::post('admin/password_update', [AdminController::class , 'AdminPasswordUpdate'])->name('admin.password_update');

    //Documents
    Route::get('admin/document', [InformationController::class , 'document'])->name('admin.document');
    Route::get('admin/add_document', [InformationController::class , 'add_document'])->name('admin.add_document');
    
    Route::post('admin/upload_folder', [InformationController::class , 'upload_folder'])->name('admin.upload_folder');
    Route::get('admin/document/folder/{id}', [InformationController::class , 'document_folder'])->name('admin.document_folder');
    Route::get('admin/document/folder/add/{id}', [InformationController::class , 'document_folder_add'])->name('admin.document_folder_add');
    Route::post('admin/document/folder/upload_document', [InformationController::class , 'upload_document'])->name('admin.upload_document');
    Route::get('admin/view/{id}', [InformationController::class , 'view'])->name('admin.view');
    Route::get('admin/delete_document/{id}', [InformationController::class , 'delete_document'])->name('admin.delete_document');
    Route::get('admin/download/{file}', [InformationController::class , 'download'])->name('admin.download');


    Route::get('admin/document/notepad', [InformationController::class , 'note_document'])->name('admin.note_document');
    Route::get('admin/document/notepad_file/{id}', [InformationController::class , 'notepad_file'])->name('admin.notepad_file');


    //Recodes
    Route::get('admin/recode', [InformationController::class , 'recode'])->name('admin.recode');
    Route::get('admin/add_recode', [InformationController::class , 'add_recode'])->name('admin.add_recode');
    Route::post('admin/upload_recode', [InformationController::class , 'upload_recode'])->name('admin.upload_recode');
    Route::get('admin/view_recode/{id}', [InformationController::class , 'view_recode'])->name('admin.view_recode');
    Route::get('admin/edit_recode/{id}', [InformationController::class , 'edit_recode'])->name('admin.edit_recode');
    Route::post('admin/update_recode/{id}', [InformationController::class , 'update_recode'])->name('admin.update_recode');
    Route::get('admin/delete_recode/{id}', [InformationController::class , 'delete_recode'])->name('admin.delete_recode');

    //Notepad
    Route::get('admin/notepad', [InformationController::class , 'notepad'])->name('admin.notepad');
    Route::get('admin/add_note', [InformationController::class , 'add_note'])->name('admin.add_note');
    Route::post('admin/upload_note', [InformationController::class , 'upload_note'])->name('admin.upload_note');
    Route::get('admin/show_note/{id}', [InformationController::class , 'show_note'])->name('admin.show_note');
    Route::post('admin/update_note/{id}', [InformationController::class , 'update_note'])->name('admin.update_note');
    Route::get('admin/delete_note/{id}', [InformationController::class , 'delete_note'])->name('admin.delete_note');

});
/* 
Route::get('/', [AdminController::class , 'AdminLogin'])->name('admin.login'); */
