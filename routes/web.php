<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Newsletter Frontend Subscribe
|--------------------------------------------------------------------------
*/
Route::post('/newsletter-subscribe', [NewsletterController::class, 'store'])
    ->name('newsletter.store');

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| Inquiry Routes
|--------------------------------------------------------------------------
*/
Route::post('/inquiry/add', [InquiryController::class, 'addToCart'])->name('inquiry.add');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::patch('/inquiry/edit/{index}', [InquiryController::class, 'edit'])->name('inquiry.edit');
Route::delete('/inquiry/delete/{index}', [InquiryController::class, 'delete'])->name('inquiry.delete');

Route::get('/inquiry', function () {
    return view('inquiry');
})->name('inquiry.page');

/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Entry
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        if (
            (isset(auth()->user()->role) && auth()->user()->role !== 'admin') &&
            (!isset(auth()->user()->is_admin) || !auth()->user()->is_admin)
        ) {
            abort(403);
        }

        return redirect()->route('admin.dashboard');
    })->name('home');

    /*
    |--------------------------------------------------------------------------
    | Admin Auth
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Resource CRUD
        |--------------------------------------------------------------------------
        */
        Route::resource('products', AdminProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

        /*
        |--------------------------------------------------------------------------
        | Inquiries
        |--------------------------------------------------------------------------
        */
        Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');

        /*
        |--------------------------------------------------------------------------
        | Newsletter Subscribers List
        |--------------------------------------------------------------------------
        */
        Route::get('/newsletter-subscribers', [NewsletterSubscriberController::class, 'index'])
            ->name('newsletter.index');

        /*
        |--------------------------------------------------------------------------
        | Newsletter Send Page + Action
        |--------------------------------------------------------------------------
        | IMPORTANT:
        | Since we are already inside prefix('admin') and name('admin.'),
        | do NOT write ->name('admin.newsletter.create')
        | just write ->name('newsletter.create')
        |--------------------------------------------------------------------------
        */
        Route::get('/newsletter/send', [NewsletterController::class, 'create'])
            ->name('newsletter.create');

        Route::post('/newsletter/send', [NewsletterController::class, 'send'])
            ->name('newsletter.send');
    });
});
// Route::get('/test-mail', function () {
//     \Illuminate\Support\Facades\Mail::raw('Test email from Laravel', function ($message) {
//         $message->to('mehakarmaan1@gmail.com')
//                 ->subject('Test Mail');
//     });

//     return 'Mail sent';
// });
