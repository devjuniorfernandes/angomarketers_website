<?php

use App\Domain\Core\Controllers\HomeController;
use App\Domain\Core\Controllers\SearchController;
use App\Domain\Core\Controllers\ContactController;
use App\Domain\Core\Controllers\SEOController;
use App\Domain\Articles\Controllers\ArticleController;
use App\Domain\Articles\Controllers\AuthorController;
use App\Domain\Categories\Controllers\CategoryController;
use App\Domain\Events\Controllers\EventController;
use App\Domain\Trainings\Controllers\TrainingController;
use App\Domain\Newsletter\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes render clean, premium Blade views for AngoMarketers.
|
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lazy-load-sections', [HomeController::class, 'lazyLoadSections'])->name('lazy-load-sections');

// SEO Routes
Route::get('/sitemap.xml', [SEOController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SEOController::class, 'robots'])->name('robots');

// Category Listing Page
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category');

// News Module Routes
Route::get('/noticias', [ArticleController::class, 'index'])->name('news.index');
Route::get('/noticias/{slug}', [ArticleController::class, 'show'])->name('article');
Route::post('/noticias/{slug}/comment', [ArticleController::class, 'storeComment'])->name('article.comment.store');

// Author Profile Page
Route::get('/author/{slug}', [AuthorController::class, 'show'])->name('author');

// Search Results Page
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Newsletter Subscription Page
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Contact Submit Form
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Static Content Pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

// Events Module Routes
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');
Route::get('/eventos/{slug}', [EventController::class, 'show'])->name('events.show');

// Trainings Module Routes
Route::get('/formacoes', [TrainingController::class, 'index'])->name('trainings.index');
Route::get('/formacoes/{slug}', [TrainingController::class, 'show'])->name('trainings.show');

// Redirects for legacy URLs
Route::get('/news', fn() => redirect()->route('news.index', [], 301));
Route::get('/news/{slug}', fn($slug) => redirect()->route('article', ['slug' => $slug], 301));
Route::get('/events', fn() => redirect()->route('events.index', [], 301));
Route::get('/events/{slug}', fn($slug) => redirect()->route('events.show', ['slug' => $slug], 301));
Route::get('/trainings', fn() => redirect()->route('trainings.index', [], 301));
Route::get('/trainings/{slug}', fn($slug) => redirect()->route('trainings.show', ['slug' => $slug], 301));

// Admin Login Routes (Guest only)
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');
});

// Admin CMS Routes (Protected by Auth middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Articles CRUD
    Route::resource('articles', App\Domain\Articles\Controllers\Admin\ArticleController::class);

    // Authors CRUD
    Route::resource('authors', App\Domain\Articles\Controllers\Admin\AuthorController::class);

    // Categories CRUD
    Route::resource('categories', App\Domain\Categories\Controllers\Admin\CategoryController::class);

    // Tags CRUD
    Route::resource('tags', App\Domain\Core\Controllers\Admin\TagController::class);

    // Partners CRUD
    Route::resource('partners', App\Domain\Core\Controllers\Admin\PartnerController::class);

    // Slider Items CRUD
    Route::resource('slider_items', App\Domain\Core\Controllers\Admin\SliderItemController::class);

    // Menu Navigation CRUD
    Route::resource('menus', App\Domain\Core\Controllers\Admin\MenuController::class);

    // System Settings Screen
    Route::get('/settings', [App\Domain\Core\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Domain\Core\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Events CRUD
    Route::resource('events', App\Domain\Events\Controllers\Admin\EventController::class);

    // Trainings CRUD
    Route::resource('trainings', App\Domain\Trainings\Controllers\Admin\TrainingController::class);

    // Comments Management
    Route::get('/comments', [App\Domain\Articles\Controllers\Admin\CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments/{comment}/approve', [App\Domain\Articles\Controllers\Admin\CommentController::class, 'approve'])->name('comments.approve');
    Route::delete('/comments/{comment}', [App\Domain\Articles\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');

    // Subscribers Listing
    Route::get('/subscribers', [App\Domain\Newsletter\Controllers\Admin\SubscriberController::class, 'index'])->name('subscribers.index');
});

Route::get('/setup-db', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
        return 'Base de dados MySQL estruturada e dados iniciais inseridos com sucesso!';
    } catch (\Exception $e) {
        return 'Erro: ' . $e->getMessage();
    }
});
