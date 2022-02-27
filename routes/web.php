<?php


// use App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'PageController@index')->name('index');

Route::get('/about', 'PageController@about')->name('web.about.index');
Route::get('/about/team', 'PageController@team')->name('web.about.team');
Route::get('/about/gallery', 'PageController@gallery')->name('web.gallery.index');
Route::get('/about/gallery/{id}', 'PageController@galleryshow')->name('web.gallery.show');

Route::get('/concours', 'PageController@concours')->name('web.concours.index');
Route::get('/concours/post/{slug}', 'PageController@concoursshow')->name('web.concours.show');

Route::get('/bourses', 'PageController@bourses')->name('web.bourses.index');
Route::get('/bourses/post/{slug}', 'PageController@boursesshow')->name('web.bourses.show');

Route::get('/ecoles', 'PageController@ecoles')->name('web.ecoles.index');
Route::get('/ecoles/post/{slug}', 'PageController@ecolesshow')->name('web.ecoles.show');

Route::get('/events', 'PageController@events')->name('web.events.index');
Route::get('/events/upcoming', 'PageController@upcomingevents')->name('upcoming-events');
Route::get('/events/passed', 'PageController@passedevents')->name('passed-events');
Route::get('/events/{id}', 'PageController@eventsshow')->name('web.events.show');

// Route::get('/contact', 'PageController@contact')->name('web.contact.index');
Route::post('/contact', 'PageController@senMail')->name('contact');
Route::get('/search', 'PageController@search');
Route::get('/articles/post/{slug}', 'PageController@searchDetails')->name('web.postdetail');


// Route::resource('news', 'PageController');

Route::get('/news', 'PageController@news')->name('web.news.index');
Route::get('/news/{id}', 'PageController@new')->name('web.news.show');

Route::post('/contact', 'PageController@senMail')->name('send-mail');


/*========================================================
    Admin Routes
  ======================================================== */

// Route::get('/admin', 'Admin\AdminController@index');

  Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::group(['namespace' => 'Auth'], function() {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('login');

        Route::get('/forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('password.request');

        Route::get('/reset-password/{token}', 'ResetPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('/reset-password/{token}', 'ResetPasswordController@reset')->name('password.reset');
    });

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        })->name('index');
        Route::get('/dashboard', 'DashboardController@getDashboard')->name('dashboard');

        Route::resource('team_members', 'TeamController');
        Route::post('/team_members/update-rank', 'TeamController@updateRank')->name('team_members.rank_update');

        Route::resource('events', 'EventController');
        Route::post('/certificates/update-rank', 'CertificateController@updateRank')->name('certificates.rank_update');

        Route::resource('articles', 'ArticleController');
        Route::delete('/article_file/{id}/delete', 'ArticleController@deleteFile')->name('article_files.delete');
        // Route::post('/article/{id}/add_images', 'ArticleController@addImages')->name('article.add_images');
        // Route::delete('/article_image/{id}/delete', 'ArticleController@deleteImage')->name('article_images.delete');

        Route::resource('pages', 'PageController');
        
        // Setting
        Route::get('/settings', 'SettingController@index')->name('settings');
        Route::post('/settings', 'SettingController@store')->name('settings');

        Route::resource('schools', 'SchoolController');

        Route::resource('projects', 'ProjectController');
        Route::post('/projects/{id}/add_images', 'ActivityController@addImages')->name('activity.add_images');
        Route::delete('/activity_image/{id}/delete', 'ActivityController@deleteImage')->name('activity_images.delete');

        Route::resource('news', 'NewController');
        Route::post('/news/{id}/add_images', 'NewController@addImages')->name('news.add_images');
        Route::delete('/new_image/{id}/delete', 'NewController@deleteImage')->name('new_images.delete');

        Route::resource('categories', 'CategoryController');

        Route::resource('logos', 'LogoController');

        Route::resource('galleries', 'GalleryController');
        Route::delete('/gallery_image/{id}/delete', 'GalleryController@deleteImage')->name('gallery_images.delete');


        Route::post('/solutions/update-rank', 'Solution\SolutionController@updateRank')->name('solutions.rank_update');
        Route::resource('solution_documents', 'Solution\DocumentController');

        Route::resource('partners', 'PartnerController');

        Route::resource('administrator', 'AdminController');

        // PROFILE
        Route::get('/profile', 'ProfileController@getProfile')->name('profile');
        Route::post('/profile/edit', 'ProfileController@editProfile')->name('profile.edit');
        Route::post('/profile/change-password', 'ProfileController@changePassword')->name('profile.password');

        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});


// Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
