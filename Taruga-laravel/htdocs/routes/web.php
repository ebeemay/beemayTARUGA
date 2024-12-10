<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\SupportController;

Route::get('/', function () {
    return view('home');
});

//index
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/identification', [HomeController::class, 'nextPage'])->name('identification');


//tipo de usuário
Route::get('/choose-login/{userType}', [AuthController::class, 'showLoginForm'])->name('choose-login');
Route::get('/choose-register/{userType}', [AuthController::class, 'showRegisterForm'])->name('choose-register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//estudantes
Route::get('/student/register', [StudentAuthController::class, 'showRegisterForm'])->name('student.register.form');
Route::post('/student/register', [StudentAuthController::class, 'register']) -> name('student.register');
Route::get('/student/login', [StudentAuthController::class, 'showLoginForm'])->name('student.identification');
Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login');
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

Route::post('/students', [StudentAuthController::class, 'registerStudent'])->middleware('auth:teacher');
Route::put('/students/{id}', [StudentAuthController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentAuthController::class, 'delete'])->name('students.delete');

Route::post('/profile/photo', [StudentAuthController::class, 'updatePhoto'])->name('select.photo');



Route::middleware('auth:student')->group(function () {
    Route::get('/student/HomeStudent', function () {
        return view('homeUser');
    })->name('HomeStudent');
    Route::get('/student/SearchSubject', function () {
        return view('students.searchSubject');
    })->name('SearchSubject');
    Route::get('/student/Modules', function () {
        return view('students.modules');
    })->name('Modules');
    Route::get('/student/ModulesPt', function () {
        return view('students.modulesPt');
    })->name('ModulesPt');
    Route::get('/student/Profile', function () {
        return view('students.profile_student');
    })->name('Profile');
    Route::get('/student/AboutUs', function () {
        return view('aboutUs');
    })->name('AboutUsStudent');
    Route::get('/student/activities/FirstActivity', function () {
        return view('students.activities.firstActivity.firstScreen');
    })->name('activity.firstScreen');
    Route::get('/student/activities/FirstActivity', function () {
        return view('students.activities.firstActivity.congratulations');
    })->name('congratulations');
});


//progresso
Route::middleware(['auth:student'])->group(function () {
    Route::get('/students/{studentId}/progress/{numeroAtividade}', [ProgressController::class, 'getProgress'])->name('progress.get');
    Route::get('/studentsPt/{studentId}/progress/{numeroAtividade}', [ProgressController::class, 'getProgressPt'])->name('progress.getPt');
    Route::post('/modulos/iniciar/{materia}/{numeroAtividade}', [ProgressController::class, 'iniciarProgresso'])->name('iniciar.progresso');
    Route::post('/modulosPt/iniciar/{materia}/{numeroAtividade}', [ProgressController::class, 'iniciarProgressoPt'])->name('iniciar.progressoPt');
    Route::get('/atividade/{materia}/{numeroAtividade}', [ProgressController::class, 'exibirAtividade'])->name('atividade.view');
    Route::get('/atividadePt/{materia}/{numeroAtividade}', [ProgressController::class, 'exibirAtividadePt'])->name('atividade.viewPt');
});

Route::post('/progress/update', [ProgressController::class, 'updateProgress'])->name('progress.update');
Route::post('/progressPt/update', [ProgressController::class, 'updateProgressPt'])->name('progress.updatePt');


//professor
Route::post('/teacher/login', [TeacherController::class, 'login']);
Route::post('/teacher/update-password', [TeacherController::class, 'updatePassword']);

Route::middleware('auth:teacher')->group(function () {
    Route::get('/teacher/HomeTeacher', function () {
        return view('homeUser');
    })->name('HomeTeacher');
    Route::get('/teacher/AboutUs', function () {
        return view('aboutUs');
    })->name('AboutUsTeacher');
    Route::post('/students', [StudentAuthController::class, 'registerStudent'])->name('student.register.t');
    Route::get('/teacher/List', [TeacherController::class, 'teacherList'])->name('teacher.list'); 
    Route::get('/students', [StudentAuthController::class, 'search'])->name('students.search');
});



Route::post('/teachers', [TeacherController::class, 'registerTeacher'])->middleware('auth:institution');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');




//instituicao
Route::post('/institutions/register', [InstitutionController::class, 'registerInstitution'])->name('institution.register');
Route::get('/institutions/login', [InstitutionController::class, 'showLoginForm'])->name('institution.login');
Route::post('/institutions/login', [InstitutionController::class, 'login']);

Route::middleware('auth:institution')->group(function () {
    Route::get('/institution/HomeInstitution',  function () {
        return view('homeUser');
    })->name('HomeInstitution');
    Route::get('/institution/List', [InstitutionController::class, 'institutionList'])->name('institution.list'); 
    Route::get('/teachers', [TeacherController::class, 'search'])->name('teachers.search');
    Route::get('/institution/AboutUs', function () {
        return view('aboutUs');
    })->name('AboutUsInstitution');
});



//contato

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/send-email', [SupportController::class, 'sendEmail'])->name('send.email');
