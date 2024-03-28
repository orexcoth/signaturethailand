<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\DarkModeController;
use App\Http\Controllers\Backend\ColorSchemeController;

use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\UsersController;

use App\Http\Controllers\Backend\CustomersController;
use App\Http\Controllers\Backend\NamesController;
use App\Http\Controllers\Backend\SignsController;
use App\Http\Controllers\Backend\WorksController;
use App\Http\Controllers\Backend\CommissionsController;
use App\Http\Controllers\Backend\ArticlesController;
use App\Http\Controllers\Backend\ContactsController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\Backend\SettingsController;

use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Frontend\CheckoutCustomerController;
use App\Http\Controllers\Frontend\NamesAndSignsCustomerController;




use App\Http\Controllers\Backend\testImageController;


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
Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::get('change-language/{locale}',[LanguageController::class, 'changeLanguage'])->name('change.language');
Route::get('/phpinfo', function () {
    return phpinfo();
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});

// Route::get('/login-page', [AuthController::class, 'loginView']);
// Route::post('/login', [AuthController::class, 'login']);


Route::controller(FrontendPageController::class)->group(function() {
        
});
Route::middleware('sessionlogin')->group(function() {

});

// Frontend
// Frontend
// Frontend
Route::get('login-system', [AuthController::class, 'backendLogin'])->name('backendLogin');
Route::get('/login', [FrontendPageController::class, 'loginPage'])->name('loginPage');
Route::get('/', [FrontendPageController::class, 'indexPage'])->name('indexPage');
Route::get('home', [FrontendPageController::class, 'homePage'])->name('homePage');

Route::get('about', [FrontendPageController::class, 'aboutPage'])->name('aboutPage');
Route::get('article', [FrontendPageController::class, 'articlePage'])->name('articlePage');
Route::get('team', [FrontendPageController::class, 'teamPage'])->name('teamPage');
Route::get('contact', [FrontendPageController::class, 'contactPage'])->name('contactPage');
Route::post('cart', [FrontendPageController::class, 'cartPage'])->name('cartPage');

Route::get('history-login', [FrontendPageController::class, 'historyloginPage'])->name('historyloginPage');
Route::get('history', [FrontendPageController::class, 'historyPage'])->name('historyPage');

Route::get('product', [FrontendPageController::class, 'productPage'])->name('productPage');
Route::get('product-detail/{name}', [FrontendPageController::class, 'productdetailPage'])->name('productdetailPage');
Route::get('allproduct-th', [FrontendPageController::class, 'allproductTHPage'])->name('allproductTHPage');
Route::get('allproduct-en', [FrontendPageController::class, 'allproductENPage'])->name('allproductENPage');

Route::post('fill-in-information', [FrontendPageController::class, 'fillininformationPage'])->name('fillininformationPage');
Route::post('sell-checkout', [CheckoutCustomerController::class, 'sell_checkout'])->name('sell_checkout');
Route::get('thank/{sell_id}', [CheckoutCustomerController::class, 'thankPage'])->name('thankPage');






// Backend
// Backend
// Backend
Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');        


    Route::get('/backend/blur', [BackendPageController::class, 'bn_blur'])->name('bn_blur');
    Route::post('/backend/blur-upload', [BackendPageController::class, 'bn_blur_upload'])->name('bn_blur_upload');
    Route::get('/backend/watermark', [BackendPageController::class, 'bn_watermark'])->name('bn_watermark');
    Route::post('/backend/watermark-upload', [BackendPageController::class, 'bn_watermark_upload'])->name('bn_watermark_upload');
    Route::get('/backend/mosaic', [BackendPageController::class, 'bn_mosaic'])->name('bn_mosaic');
    Route::post('/backend/mosaic-upload', [BackendPageController::class, 'bn_mosaic_upload'])->name('bn_mosaic_upload');



    Route::prefix('backend')->group(function () {

        Route::get('/', [BackendPageController::class, 'backendDashboard'])->name('backendDashboard');

        Route::prefix('customers')->group(function () {
            Route::get('', [CustomersController::class, 'BN_customers'])->name('BN_customers');
            Route::get('add', [CustomersController::class, 'BN_customers_add'])->name('BN_customers_add');
            Route::post('add-action', [CustomersController::class, 'BN_customers_add_action'])->name('BN_customers_add_action');
            Route::get('edit/{id}', [CustomersController::class, 'BN_customers_edit'])->name('BN_customers_edit');
            Route::post('edit-action', [CustomersController::class, 'BN_customers_edit_action'])->name('BN_customers_edit_action');
        });
        Route::prefix('names')->group(function () {
            Route::get('', [NamesController::class, 'BN_names'])->name('BN_names');
            Route::post('mock-suggest', [NamesController::class, 'BN_names_mock_suggest'])->name('BN_names_mock_suggest');
            Route::get('suggest', [NamesController::class, 'BN_names_suggest'])->name('BN_names_suggest')->defaults('suggest_status', 'suggested');
            Route::get('suggest-delete/{id}', [NamesController::class, 'BN_names_suggest_delete'])->name('BN_names_suggest_delete');

            Route::get('store', [NamesController::class, 'BN_names_store'])->name('BN_names_store');
            Route::get('add', [NamesController::class, 'BN_names_add'])->name('BN_names_add');
            Route::post('add-action', [NamesController::class, 'BN_names_add_action'])->name('BN_names_add_action');
            Route::get('edit/{id}', [NamesController::class, 'BN_names_edit'])->name('BN_names_edit');
            Route::post('edit-action', [NamesController::class, 'BN_names_edit_action'])->name('BN_names_edit_action');
            Route::get('detail/{id}', [NamesController::class, 'BN_names_detail'])->name('BN_names_detail');

            Route::get('import', [NamesController::class, 'BN_names_import'])->name('BN_names_import');
            Route::post('import-action', [NamesController::class, 'BN_names_import_action'])->name('BN_names_import_action');
            Route::get('import-result', [NamesController::class, 'BN_names_import_result'])->name('BN_names_import_result');

            Route::get('sign/add/{lang}/{id}', [NamesController::class, 'BN_names_sign_add'])->name('BN_names_sign_add');
            Route::post('sign/add-action', [NamesController::class, 'BN_names_sign_add_action'])->name('BN_names_sign_add_action');

            
        });
        Route::prefix('signs')->group(function () {
            Route::get('', [BackendPageController::class, 'BN_signs'])->name('BN_signs');
        });
        Route::prefix('works')->group(function () {
            Route::get('', [WorksController::class, 'BN_works'])->name('BN_works');
            Route::get('assign', [WorksController::class, 'BN_works_assign'])->name('BN_works_assign');
            Route::post('assign-action', [WorksController::class, 'BN_works_assign_action'])->name('BN_works_assign_action');
            Route::get('list', [WorksController::class, 'BN_works_list'])->name('BN_works_list');
            Route::get('report', [WorksController::class, 'BN_works_report'])->name('BN_works_report');
        });
        Route::prefix('commissions')->group(function () {
            Route::get('', [BackendPageController::class, 'BN_commissions'])->name('BN_commissions');
        });
        Route::prefix('articles')->group(function () {
            Route::get('', [ArticlesController::class, 'BN_articles'])->name('BN_articles');
            Route::get('add', [ArticlesController::class, 'BN_articles_add'])->name('BN_articles_add');
            Route::post('add-action', [ArticlesController::class, 'BN_articles_add_action'])->name('BN_articles_add_action');
            Route::get('edit/{id}', [ArticlesController::class, 'BN_articles_edit'])->name('BN_articles_edit');
            Route::post('edit-action', [ArticlesController::class, 'BN_articles_edit_action'])->name('BN_articles_edit_action');
        });
        Route::prefix('contacts')->group(function () {
            Route::get('', [ContactsController::class, 'BN_contacts'])->name('BN_contacts');
            Route::get('detail', [ContactsController::class, 'BN_contacts_detail'])->name('BN_contacts_detail');
        });
        Route::prefix('reports')->group(function () {
            Route::get('', [ReportsController::class, 'BN_reports'])->name('BN_reports');
            Route::get('sells', [ReportsController::class, 'BN_reports_sells'])->name('BN_reports_sells');
            Route::get('orders', [ReportsController::class, 'BN_reports_orders'])->name('BN_reports_orders');
        });
        Route::prefix('users')->group(function () {

            Route::get('', [UsersController::class, 'BN_users'])->name('BN_users');
            Route::get('add', [UsersController::class, 'BN_users_add'])->name('BN_users_add');
            Route::post('add-action', [UsersController::class, 'BN_users_add_action'])->name('BN_users_add_action');
            Route::get('edit/{id}', [UsersController::class, 'BN_users_edit'])->name('BN_users_edit');
            Route::post('edit-action', [UsersController::class, 'BN_users_edit_action'])->name('BN_users_edit_action');

        });
        Route::prefix('settings')->group(function () {
            Route::get('', [BackendPageController::class, 'BN_settings'])->name('BN_settings');
            Route::post('settings-action', [BackendPageController::class, 'BN_settings_action'])->name('BN_settings_action');
            Route::get('defaultprice', [BackendPageController::class, 'BN_settings_defaultprice'])->name('BN_settings_defaultprice');
            Route::post('defaultprice-action', [BackendPageController::class, 'BN_settings_defaultprice_action'])->name('BN_settings_defaultprice_action');
        });

    });

    // Route::get('/backend/profile', [UsersController::class, 'BN_profile'])->name('BN_profile');
    // Route::get('/backend/profile-edit', [UsersController::class, 'BN_profile_edit'])->name('BN_profile_edit');
    // Route::post('/backend/profile-edit-action', [UsersController::class, 'BN_profile_edit_action'])->name('BN_profile_edit_action');

    

    

    

    

    

    

    

    


    // Route::controller(PageController::class)->group(function() {
    //     // Route::get('/', 'backendDashboard')->name('backendDashboard');
    //     // Route::get('login-page', 'login')->name('login');
        
    //     Route::get('dashboard-overview-1-page', 'dashboardOverview1')->name('dashboard-overview-1');
    //     Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
    //     Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
    //     Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
    //     Route::get('inbox-page', 'inbox')->name('inbox');
    //     Route::get('file-manager-page', 'fileManager')->name('file-manager');
    //     Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
    //     Route::get('chat-page', 'chat')->name('chat');
    //     Route::get('post-page', 'post')->name('post');
    //     Route::get('calendar-page', 'calendar')->name('calendar');
    //     Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
    //     Route::get('crud-form-page', 'crudForm')->name('crud-form');
    //     Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
    //     Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
    //     Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
    //     Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
    //     Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
    //     Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
    //     Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
    //     Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
    //     Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
    //     Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
    //     Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
    //     Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
    //     Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
    //     Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
    //     Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
    //     Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
    //     Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
    //     Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
    //     Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
    //     Route::get('register-page', 'register')->name('register');
    //     Route::get('error-page-page', 'errorPage')->name('error-page');
    //     Route::get('update-profile-page', 'updateProfile')->name('update-profile');
    //     Route::get('change-password-page', 'changePassword')->name('change-password');
    //     Route::get('regular-table-page', 'regularTable')->name('regular-table');
    //     Route::get('tabulator-page', 'tabulator')->name('tabulator');
    //     Route::get('modal-page', 'modal')->name('modal');
    //     Route::get('slide-over-page', 'slideOver')->name('slide-over');
    //     Route::get('notification-page', 'notification')->name('notification');
    //     Route::get('tab-page', 'tab')->name('tab');
    //     Route::get('accordion-page', 'accordion')->name('accordion');
    //     Route::get('button-page', 'button')->name('button');
    //     Route::get('alert-page', 'alert')->name('alert');
    //     Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
    //     Route::get('tooltip-page', 'tooltip')->name('tooltip');
    //     Route::get('dropdown-page', 'dropdown')->name('dropdown');
    //     Route::get('typography-page', 'typography')->name('typography');
    //     Route::get('icon-page', 'icon')->name('icon');
    //     Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
    //     Route::get('regular-form-page', 'regularForm')->name('regular-form');
    //     Route::get('datepicker-page', 'datepicker')->name('datepicker');
    //     Route::get('tom-select-page', 'tomSelect')->name('tom-select');
    //     Route::get('file-upload-page', 'fileUpload')->name('file-upload');
    //     Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
    //     Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
    //     Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
    //     Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
    //     Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
    //     Route::get('validation-page', 'validation')->name('validation');
    //     Route::get('chart-page', 'chart')->name('chart');
    //     Route::get('slider-page', 'slider')->name('slider');
    //     Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    // });
});