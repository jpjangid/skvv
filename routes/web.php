<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\CollegeController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PhotoController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\RolePermissionController;        
use App\Http\Controllers\admin\UserPermissionController;
use App\Http\Controllers\admin\AddimmisionExamController;
use App\Http\Controllers\admin\AlumnispeakController;

//Route for home
Route::get('/',[App\Http\Controllers\Front\HomeController::class,'index']);

//Route for 404 error page
Route::view('404','404');

Auth::routes();

//Routes for login users
Route::middleware(['auth' ,'prevent'])->group(function () {

    //Routes for admin 
    Route::prefix('admin')->group(function () { 
        // dashboard
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
        //Routes for users
        Route::resource('users',UserController::class);
        //Routes for slider
        Route::resource('slider',SliderController::class);
        //Route for page 
        Route::resource('page',PageController::class);
        //Route for college 
        Route::resource('college',CollegeController::class);
        //Route for department
        Route::resource('department',DepartmentController::class);
        //Route for category
        Route::resource('category',CategoryController::class);
        //Route for photo
        Route::resource('photo',PhotoController::class);
        //Route for video
        Route::resource('video',VideoController::class);
        //Route For alumni speck
        Route::resource('alumnispeak',AlumnispeakController::class);
        //Route for enquiry
        Route::resource('enquiry',App\Http\Controllers\admin\EnquiryController::class);
        //Route for faculty
        Route::resource('faculty',App\Http\Controllers\admin\FacultyController::class);

        //Route for Addmission and Exam
        Route::resource('addmissionexam',AddimmisionExamController::class);
        Route::get('addmissionexam/get-dept/{id}',[AddimmisionExamController::class,'getdepartment']);
        Route::get('addmissionexam/get-course/{id}',[AddimmisionExamController::class,'getcourse']);

        //Route for courses
        Route::resource('course',App\Http\Controllers\admin\CourseController::class);

        //Route for profile update
        Route::get('profile/{id}',[UserController::class,'edit_admin_profile'])->name('profile.admin');
        Route::put('profile/{id}',[UserController::class,'update_admin_profile'])->name('profile.admin.update');

        //Route for news and events
        Route::prefix('news/events')->group(function () {
            Route::get('/',[NewsController::class,'index'])->name('news.index');
            Route::get('/create',[NewsController::class,'create'])->name('news.create');
            Route::post('/store',[NewsController::class,'store'])->name('news.store');
            Route::get('/edit/{news}',[NewsController::class,'edit'])->name('news.edit');
            Route::patch('/update/{id}',[NewsController::class,'update'])->name('news.update');
            Route::delete('/delete/{id}',[NewsController::class,'destroy'])->name('news.destroy');
        });    

        //Route for userpermissions
        Route::prefix('userpermissions')->group(function () {
            Route::get('/', [UserPermissionController::class,'index']);
            Route::get('edit/{id}', [UserPermissionController::class,'edit']);
            Route::post('store', [UserPermissionController::class,'store']);
        });    

        //Route for roles permissions
        Route::get('role/permissions',[RolePermissionController::class, 'index']);  
        Route::get('rolepermission/edit/{id}',[RolePermissionController::class,'edit']);
        Route::post('rolepermissions/store',[RolePermissionController::class,'store']);    
    });

    //Route for Get State City //
    Route::post('get-city-list',[UserController::class,'getCity']);
    Route::post('get-pincode-list',[UserController::class,'getPincode']);

    //Route to get college list
    Route::post('get-colleges',[CollegeController::class,'getCollegesList']);

    Route::get('/page/status/update', [PageController::class,'updateStatus'])->name('pages.update.status');
});

Route::get('contact-us',[App\Http\Controllers\Front\PageController::class,'contactUs']);
Route::get('about-us',[App\Http\Controllers\Front\PageController::class,'aboutUs']);
Route::post('enquiry-us',[App\Http\Controllers\Front\EnquiryController::class,'store']);
Route::get('recruitment',[App\Http\Controllers\Front\NewsController::class,'recruitment']);
Route::get('award-achievements',[App\Http\Controllers\Front\NewsController::class,'award']);
Route::get('award-&-achievements',[App\Http\Controllers\Front\NewsController::class,'awardAchievements']);


// Create Permission
Route::view('per','per');
Route::post('test',[App\Http\Controllers\PermissionController::class,'permission'])->name('per.create');

//Route for addmission
Route::get('admission',[App\Http\Controllers\Front\AddimmisionExamController::class,'addmission']);
Route::get('addmission/{id}',[App\Http\Controllers\Front\AddimmisionExamController::class,'addmissionlist']);

//Route for UNIVERSITY EXAMS
Route::get('university-exams',[App\Http\Controllers\Front\AddimmisionExamController::class,'exams']);
Route::get('university-exams/{slug}',[App\Http\Controllers\Front\AddimmisionExamController::class,'examsSlug']);

//Route for courses offered
Route::get('courses-offered',[App\Http\Controllers\Front\CourseController::class,'courses']);
Route::get('courses-offered/{slug}',[App\Http\Controllers\Front\CourseController::class,'coursesOffered']);


//Route for photo gallery
Route::get('photo-gallery',[App\Http\Controllers\Front\PhotoController::class,'index'])->name('front.photo.gallery');

//Route for video gallery
Route::get('video-gallery',[App\Http\Controllers\Front\VideoController::class,'index'])->name('front.video.gallery');

//Route for news event
Route::get('news-events',[App\Http\Controllers\Front\NewsEventsController::class,'index'])->name('front.news.events');
Route::get('news-events/{news}',[App\Http\Controllers\Front\NewsEventsController::class,'getNews'])->name('front.news.slug');

//Route for course front
Route::get('{department}/courses',[App\Http\Controllers\Front\CourseController::class,'index'])->name('front.course');

//Route for front department 
Route::get('{department}',[App\Http\Controllers\Front\DepartmentController::class,'index'])->name('front.department');

