<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RealstatecategoryController;
use App\Http\Controllers\RealstatefacilitiesController;
use App\Http\Controllers\RealstatefeatureController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PageController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
   // Blogs
    Route::get('/blog-lists', [BlogController::class, 'blogList'])->name('blogList');
    Route::get('/blog-create-new', [BlogController::class, 'createNewBlog'])->name('createNewBlog');
    Route::post('/blog-create-post', [BlogController::class, 'store'])->name('createNewBlogStore');
    Route::get('/blog-post-edit-{id}', [BlogController::class, 'edit'])->name('EditBlog');
    Route::post('/blog-post-edit-post', [BlogController::class, 'update'])->name('UpdateBlog');
    Route::get('/blog-post-delete-{id}', [BlogController::class, 'delete'])->name('DeleteBlog');
    // Blogs

    //Categories
    Route::get('/categories', [CategoryController::class, 'categoriesList'])->name('categoriesList');
    Route::post('/categories-post', [CategoryController::class, 'store'])->name('categoryPost');
    Route::post('/categories-edit-{id}', [CategoryController::class, 'edit'])->name('categoryEdit');
    Route::get('/categories-delete-{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
    //Categories

    // Countries
    Route::get('/countries-lists', [LocationController::class, 'indexCountries'])->name('indexCountries');
    Route::post('/countries-post', [LocationController::class, 'CountriesPost'])->name('CountriesPost');
    Route::post('/countries-edit-{id}', [LocationController::class, 'CountriesEdit'])->name('CountriesEdit');
    Route::get('/countries-delete-{id}', [LocationController::class, 'delete'])->name('CountriesDelete');
    // Countries

    // States
    Route::get('/states-lists', [LocationController::class, 'indexStates'])->name('indexStates');
    Route::post('/states-post', [LocationController::class, 'StatesPost'])->name('StatesPost');
    Route::post('/states-edit-{id}', [LocationController::class, 'StatesEdit'])->name('StatesEdit');
    Route::get('/states-delete-{id}', [LocationController::class, 'StatesDelete'])->name('StatesDelete');
    // States

    // Cities
    Route::get('/cities-lists', [LocationController::class, 'indexCities'])->name('indexCities');
    Route::post('/cities-post', [LocationController::class, 'CitiesPost'])->name('CitiesPost');
    Route::post('/cities-edit-{id}', [LocationController::class, 'CitiesEdit'])->name('CitiesEdit');
    Route::get('/cities-delete-{id}', [LocationController::class, 'CitiesDelete'])->name('CitiesDelete');
    // Cities

    // Accounts
    Route::get('/accounts-list', [AccountController::class, 'AccountList'])->name('AccountList');
    Route::get('/accounts-edit-{id}', [AccountController::class, 'AccountEdit'])->name('AccountEdit');
    Route::post('/accounts-edit-post', [AccountController::class, 'AccountEditPost'])->name('AccountEditPost');
    // Accounts


    // RealState Categories
    Route::get('/realstate-categories', [RealstatecategoryController::class, 'index'])->name('realstateIndex');
    Route::post('/realstate-categories-post', [RealstatecategoryController::class, 'store'])->name('realstateStore');
    Route::post('/realstate-categories-edit-{id}', [RealstatecategoryController::class, 'edit'])->name('realstateEdit');
    Route::get('/realstate-categories-delete-{id}', [RealstatecategoryController::class, 'delete'])->name('realstateDelete');
    // RealState Categories


    // RealState Facilities
    Route::get('/realstate-facilities', [RealstatefacilitiesController::class, 'realstateFacilities'])->name('realstateFacilities');
    Route::post('/realstate-facilities-post', [RealstatefacilitiesController::class, 'realstateFacilitiesStore'])->name('realstateFacilitiesStore');
    Route::post('/realstate-facilities-edit-{id}', [RealstatefacilitiesController::class, 'realstateFacilitiesEdit'])->name('realstateFacilitiesEdit');
    Route::get('/realstate-facilities-delete-{id}', [RealstatefacilitiesController::class, 'realstateFacilitiesDelete'])->name('realstateFacilitiesDelete');
    // RealState Facilities

    // RealState Feature
    Route::get('/realstate-feature', [RealstatefeatureController::class, 'realstateFeature'])->name('realstateFeature');
    Route::post('/realstate-feature-post', [RealstatefeatureController::class, 'realstateFeatureStore'])->name('realstateFeatureStore');
    Route::post('/realstate-feature-edit-{id}', [RealstatefeatureController::class, 'realstateFeatureEdit'])->name('realstateFeatureEdit');
    Route::get('/realstate-feature-delete-{id}', [RealstatefeatureController::class, 'realstateFeatureDelete'])->name('realstateFeatureDelete');
    // RealState Feature

    //Media Library
    Route::get('/media-library', [LibraryController::class, 'LibraryIndex'])->name('LibraryIndex');
    Route::post('/media-library-post', [LibraryController::class, 'LibraryPost'])->name('LibraryPost');
    Route::get('/media-library-files', [LibraryController::class, 'LibraryFiles'])->name('LibraryFiles');
    Route::get('/media-library-delete-{id}', [LibraryController::class, 'LibraryFilesDelete'])->name('LibraryFilesDelete');
    Route::get('/media-library-trash', [LibraryController::class, 'LibraryFilesTrash'])->name('LibraryFilesTrash');
    Route::get('/media-library-trash-restore-{id}', [LibraryController::class, 'LibraryFilesTrashRestore'])->name('LibraryFilesTrashRestore');
    Route::get('/media-library-trash-delete-{id}', [LibraryController::class, 'HardDelete'])->name('HardDelete');
    //Media Library

    // Projects Start
    Route::get('/project-list', [ProjectController::class, 'indexProject'])->name('indexProject');
    Route::get('/project-create', [ProjectController::class, 'createProject'])->name('createProject');
    Route::post('/project-create-post', [ProjectController::class, 'createProjectPost'])->name('createProjectPost');
    Route::get('/project-edit-{id}', [ProjectController::class, 'createProjectEdit'])->name('createProjectEdit');
    Route::post('/project-edit-post-{id}', [ProjectController::class, 'createProjectEditPost'])->name('createProjectEditPost');
    Route::get('/project-delete-{id}', [ProjectController::class, 'softDeleteProject'])->name('softDeleteProject');
    Route::get('/project-view-trash-lists', [ProjectController::class, 'TrashListProjects'])->name('TrashListProjects');
    Route::get('/project-view-restore-{id}', [ProjectController::class, 'restoreProject'])->name('restoreProject');
    Route::get('/project-hard-delete-{id}', [ProjectController::class, 'HardDeleteProject'])->name('HardDeleteProject');
    // Projects End

    // Project Start
    Route::get('/properties-lists', [PropertyController::class, 'property_list'])->name('property_list');
    Route::get('/properties-create-new', [PropertyController::class, 'property_create'])->name('property_create');
    Route::post('/properties-create-post', [PropertyController::class, 'property_post'])->name('property_post');
    Route::get('/properties-edit-{id}', [PropertyController::class, 'property_edit'])->name('property_edit');
    Route::post('/properties-edit-post-{id}', [PropertyController::class, 'createPropertyEditPost'])->name('createPropertyEditPost');
    Route::get('/properties-delete-{id}', [PropertyController::class, 'softDeleteProperties'])->name('softDeleteProperties');
    Route::get('/properties-view-trash-lists', [PropertyController::class, 'TrashListProperties'])->name('TrashListProperties');
    Route::get('/properties-view-restore-{id}', [PropertyController::class, 'restoreProperties'])->name('restoreProperties');
    Route::get('/properties-hard-delete-{id}', [PropertyController::class, 'HardDeleteProperty'])->name('HardDeleteProperty');
    // Project END


    //Payment Start
    Route::get('/dashboard/agent/select-package', [PaymentController::class, 'package_index'])->name('package_index');
    Route::post('/dashboard/agent/select-package-post', [PaymentController::class, 'checkout'])->name('package_payment');
    // Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('checkout',[PaymentController::class, 'afterpayment'])->name('checkout.credit-card');
    //Payment End

    // Packages And Subcription Start
    Route::get('plans',[PlanController::class, 'index'])->name('plans.index');
    Route::get('/plan/{plan}',[PlanController::class, 'show'])->name('plans.show');
    Route::post('/subscription',[SubscriptionController::class, 'create'])->name('subscription.create');
    Route::get('create/plan',[SubscriptionController::class, 'createPlan'])->name('create.plan');
    Route::post('store/plan',[SubscriptionController::class, 'storePlan'])->name('store.plan');
    Route::get('plan-status-{id}',[PlanController::class, 'PlanStatus'])->name('PlanStatus');
    Route::get('plan-delete-{id}',[PlanController::class, 'DeletePackages'])->name('DeletePackages');
    // Packages And Subcription End

    //Payment gateway Setup
    Route::get('edit-paymentgateway',[PaymentController::class, 'editpayment'])->name('editpayment');
    Route::get('all-transactions',[PaymentController::class, 'transactions'])->name('transactions');
    //Payment gateway Setupv



  });


Route::get('/logout', function () {
  Auth::logout();
  return redirect('/login');
})->name('logout');

// FontPages Start
Route::get('properties/all',[PageController::class, 'properties_lists'])->name('properties_lists');
Route::get('projects/all',[PageController::class, 'projects_lists'])->name('projects_lists');
Route::get('agencies/all',[PageController::class, 'agencies_lists'])->name('agencies_lists');
Route::get('blogs/all',[PageController::class, 'blogs_lists'])->name('blogs_lists');
Route::get('contact',[PageController::class, 'contact'])->name('contact');
// FontPages End









require __DIR__.'/auth.php';
