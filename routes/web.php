<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
  BlogController,
  CategoryController,
  LocationController,
  RealstatecategoryController,
  RealstatefacilitiesController,
  RealstatefeatureController,
  LibraryController,
  ProjectController,
  PackageController,
  PaymentController,
  SubscriptionController,
  PlanController,
  PropertyController,
  PageController,
  AgentController,
  ContactController,
  AgenciesmessageController,
  HomeController,
  ChoiceController,
  TestimonialController,
  PartnerController,
  UserController,
  SettingController,
  ActivityLogController,
  TanentController,
  EmailConfigurationController,
  SubscriberController,
  AgentfeaturesController,
  AgentcategoriesController,
  LandlordController,
  ServicerequestController,
  CommentserviceController,
  ContractController,
  ExpenseController,
  TenantmessageController,
  RentControllerController,
  WithdrawController,
  ConnectstripeController,
  AgentfacilityController,
  RolesController,
  TaskController,
  CalenderController,
  DocumentsController,
};

use App\Events\ActivityHappened;
use App\Models\Commentservice;
use App\Models\Servicerequest;

Route::get('/', [HomeController::class, 'show_home'])->name('welcome');

Route::get('/dashboard', function () {
    if (Auth::user()->account_role == "NewUser") {
      return redirect('/dashboard/agent/select-package');
    }
    if (Auth::user()->account_role == 'Admin') {
        $properties = DB::table('properties')->orderBy('id','DESC')->limit(7)->get();
        $projects = DB::table('projects')->orderBy('id','DESC')->limit(7)->get();
        $logs = DB::table('activity_logs')->orderBy('id','DESC')->limit(9)->get();
        return view('dashboard',compact('properties','projects', 'logs'));
    }
    if(Auth::user()->account_role == "Agent" || Auth::user()->account_role == "Agent Stuff") {
        return redirect('/agency-dashbord');
    }
    if (Auth::user()->account_role == "Tenant") {
        return redirect('/tanent-dashbord');
    }
    if (Auth::user()->account_role == "Service Providers") {
        $serviceRequests = DB::table('servicerequests')->orderBy('id','DESC')->limit(9)->get();
        return view('ServiceDashboard.index');
    }
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'admin']], function () {

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
    Route::get('/cities-features-status-{id}', [LocationController::class, 'CitiesFeatureStatus'])->name('CitiesFeatureStatus');
    // Cities

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
    Route::get('/project-mod-status-change', [ProjectController::class, 'ModStatusChangeProject'])->name('ModStatusChangeProject');
    Route::get('/projects-display-status-change/{id}', [ProjectController::class, 'DisStatusChangeProject'])->name('DisStatusChangeProject');
    // Projects End

    // Property Start
    Route::get('/properties-lists', [PropertyController::class, 'property_list'])->name('property_list');
    Route::get('/properties-create-new', [PropertyController::class, 'property_create'])->name('property_create');
    Route::post('/properties-create-post', [PropertyController::class, 'property_post'])->name('property_post');
    Route::get('/properties-edit-{id}', [PropertyController::class, 'property_edit'])->name('property_edit');
    Route::post('/properties-edit-post-{id}', [PropertyController::class, 'createPropertyEditPost'])->name('createPropertyEditPost');
    Route::get('/properties-delete-{id}', [PropertyController::class, 'softDeleteProperties'])->name('softDeleteProperties');
    Route::get('/properties-view-trash-lists', [PropertyController::class, 'TrashListProperties'])->name('TrashListProperties');
    Route::get('/properties-view-restore-{id}', [PropertyController::class, 'restoreProperties'])->name('restoreProperties');
    Route::get('/properties-hard-delete-{id}', [PropertyController::class, 'HardDeleteProperty'])->name('HardDeleteProperty');
    Route::get('/properties-mod-status-change', [PropertyController::class, 'ModStatusChangeProperty'])->name('ModStatusChangeProperty');
    Route::get('/properties-display-status-change/{id}', [PropertyController::class, 'DisStatusChangeProperty'])->name('DisStatusChangeProperty');
    Route::get('/properties-isFeatured-change/{id}', [PropertyController::class, 'IsFeaturedChangeProperty'])->name('IsFeaturedChangeProperty');
    // Property END

    // Packages And Subcription Start
    Route::get('plans',[PlanController::class, 'index'])->name('plans.index');
    // Route::get('/plan/{plan}',[PlanController::class, 'show'])->name('plans.show');
    // Route::post('/subscription',[SubscriptionController::class, 'create'])->name('subscription.create');
    Route::get('create/plan',[SubscriptionController::class, 'createPlan'])->name('create.plan');
    Route::post('store/plan',[SubscriptionController::class, 'storePlan'])->name('store.plan');
    Route::get('plan-status-{id}',[PlanController::class, 'PlanStatus'])->name('PlanStatus');
    Route::get('plan-delete-{id}',[PlanController::class, 'DeletePackages'])->name('DeletePackages');
    // Packages And Subcription End

    //Payment gateway Setup
    Route::get('edit-paymentgateway',[PaymentController::class, 'editpayment'])->name('editpayment');
    Route::get('all-transactions',[PaymentController::class, 'transactions'])->name('transactions');
    //Payment gateway Setupv

    // Contact Start
    Route::get('all-contacts',[ContactController::class, 'allContact'])->name('allContact');
    Route::post('contacts-status',[ContactController::class, 'statusContact'])->name('statusContact');
    // Contact End

    // Admin Consult Start
    Route::get('consult-all',[ContactController::class, 'allConsult'])->name('allConsult');
    Route::post('/consults/status/save', [AgentController::class, 'MessageStatus'])->name('MessageStatusConsult');
    // Admin Consult End

    Route::resource('choices', ChoiceController::class)->except(['destroy', 'show']);
    Route::get('choices/destroy/{id}',[ChoiceController::class, 'destroy'])->name('choices.destroy');

    Route::resource('testimonials', TestimonialController::class)->except(['destroy', 'show']);
    Route::get('testimonials/destroy/{id}',[TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    Route::resource('partners', PartnerController::class)->except(['destroy', 'edit', 'update', 'show']);
    Route::get('partners/destroy/{id}',[PartnerController::class, 'destroy'])->name('partners.destroy');

    Route::resource('users', UserController::class)->except(['destroy']);
    Route::get('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('users/update-pass/{id}', [UserController::class, 'update_password'])->name('users.update.password');

    //settings strat
    Route::get('settings/logo',[SettingController::class, 'logo_edit'])->name('settings.logo.edit');
    Route::post('settings/logo',[SettingController::class, 'logo_update'])->name('settings.logo.update');

    Route::get('settings/metaKeywords',[SettingController::class, 'metaKeywords_edit'])->name('settings.metaKeywords.edit');
    Route::post('settings/metaKeywords',[SettingController::class, 'metaKeywords_update'])->name('settings.metaKeywords.update');

    Route::get('settings/generalContact',[SettingController::class, 'generalContact_edit'])->name('settings.generalContact.edit');
    Route::post('settings/generalContact',[SettingController::class, 'generalContact_update'])->name('settings.generalContact.update');

    Route::get('settings/emailConfig',[SettingController::class, 'emailConfig_edit'])->name('settings.emailConfig.edit');
    Route::post('settings/emailConfig',[SettingController::class, 'emailConfig_update'])->name('settings.emailConfig.update');

    Route::get('settings/aboutUs',[SettingController::class, 'aboutUs_edit'])->name('settings.aboutUs.edit');
    Route::post('settings/aboutUs',[SettingController::class, 'aboutUs_update'])->name('settings.aboutUs.update');

    Route::get('settings/tAndC',[SettingController::class, 'tAndC_edit'])->name('settings.tAndC.edit');
    Route::post('settings/tAndC',[SettingController::class, 'tAndC_update'])->name('settings.tAndC.update');

    Route::get('settings/privacyPolicy',[SettingController::class, 'privacyPolicy_edit'])->name('settings.privacyPolicy.edit');
    Route::post('settings/privacyPolicy',[SettingController::class, 'privacyPolicy_update'])->name('settings.privacyPolicy.update');
    //settings end

    Route::get('activityLogs',[ActivityLogController::class, 'index'])->name('activityLogs.index');
    Route::post("configuration", [EmailConfigurationController::class, "createConfiguration"])->name("configuration.store");
    Route::get("test-mail-sent", [EmailConfigurationController::class, "testMailSend"])->name("testMailSend");

    Route::get('subscribersIndex', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::get('subscribersDestroy/{id}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

    // All Rent Transactions Start
    Route::get('admin/all/transactions', [RentControllerController::class, 'adminAllTransaction'])->name('admin.transaction.history');
    Route::get('admin/all/withdraw/requests', [WithdrawController::class, 'index'])->name('admin.withdraw.request.index');
    Route::get('admin/withdraw/requests/complete/{id}', [WithdrawController::class, 'complete'])->name('admin.withdraw.request.complete');
    Route::get('admin/withdraw/requests/undo/{id}', [WithdrawController::class, 'undo'])->name('admin.withdraw.request.undo');
    Route::get('admin/withdraw/requests/cancel/{id}', [WithdrawController::class, 'cancel'])->name('admin.withdraw.request.cancel');
    // All Rent Transactions End


});

//Documents Start
Route::post('/documents-uploads', [DocumentsController::class, 'store'])->name('documents.store');
  Route::post('agencies/create/expense', [ExpenseController::class, 'store'])->name('expense.agent.store');
//Documents End

// Agent Route Start
Route::group(['middleware' => ['auth','agent', 'agentstuff']], function () {
    Route::middleware('agent')->group(function(){
        Route::get('/agency-dashbord',[AgentController::class, 'AgentDashboard'])->name('AgentDashboard');
        Route::post('/assigned/to/services/providers/{id}',[ServicerequestController::class, 'updateAssingedTo'])->name('updateAssingedTo');


        // Calender Start
        Route::get('/calender-and-appointment',[CalenderController::class, 'index'])->name('calender.index');
        Route::get('/all/appointment',[CalenderController::class, 'appointments'])->name('calender.appointments');
        Route::post('/all/appointment/post',[CalenderController::class, 'appointmentsSave'])->name('calender.appointments.save');
        Route::get('/all/appointment/status/{id}',[CalenderController::class, 'appointmentsStatus'])->name('calender.appointments.status');
        Route::get('/all/appointment/delete/{id}',[CalenderController::class, 'appointmentsDelete'])->name('calender.appointments.delete');
        // Calender End

        // Task Start
        Route::get('/my-task', [TaskController::class, 'index'])->name('agent.task');
        Route::post('/my-task/save', [TaskController::class, 'save'])->name('agent.store');
        Route::post('/my-task/update/{id}/save', [TaskController::class, 'update'])->name('agent.update');
        Route::get('/my-task/delete/{id}', [TaskController::class, 'delete'])->name('agent.delete');
        // Task End

        // Roles And Permission Start
        Route::get('agent/roles/', [RolesController::class, 'index'])->name('agent.roles');
        Route::get('agent/roles/create', [RolesController::class, 'createRoles'])->name('agent.create.roles');
        Route::post('agent/roles/create/post', [RolesController::class, 'createRolesPost'])->name('agent.create.store');
        Route::get('agent/roles/edit/{id}', [RolesController::class, 'rolesEdit'])->name('agent.roles.edit');
        Route::post('agent/roles/update/{id}', [RolesController::class, 'rolesUpdate'])->name('agent.roles.update');
        Route::get('agent/roles/delete/{id}', [RolesController::class, 'rolesDelete'])->name('agent.roles.delete');

        Route::get('agent/stuff/create', [TanentController::class, 'stuff_create'])->name('agent.stuff.create');
        Route::post('agent/stuff/create/post', [TanentController::class, 'stuff_store'])->name('agent.stuff.store');
        Route::get('agent/stuff/', [UserController::class, 'stuffUsers'])->name('agent.stuff');
        Route::post('agent/stuff/update', [UserController::class, 'stuffUserUpdate'])->name('agent.stuff.update');
        // Roles And Permission End
        //Profile Start
        Route::get('/agency-settings-profile', [AgentController::class, 'agentProfile'])->name('agent.profile');

        Route::put('/agent-profile-information/{userId}', [AgentController::class, 'updateProfileInformation'])->name('update.agent.profile.information');
        Route::put('/agent-profile-socialMedia/{userId}', [AgentController::class, 'updateProfileSocialMedia'])->name('update.agent.profile.socialMedia');
        Route::post('/agent-profile-password/{userId}', [AgentController::class, 'updateProfilePassword'])->name('update.agent.profile.passwords');


        Route::post('/agencies/properties-create-post', [PropertyController::class, 'property_post'])->name('agency.property_post');
        Route::get('/agencies/my-properties', [AgentController::class, 'MyProperties'])->name('MyProperties');
        Route::get('/agencies/my-properties/create', [AgentController::class, 'MyPropertiesCreate'])->name('MyPropertiesCreate');
        Route::get('/agencies/my-properties/edit/{id}', [AgentController::class, 'MyPropertiesEdit'])->name('MyPropertiesEdit');
        Route::post('/agencies/my-properties/update/{id}', [PropertyController::class, 'createPropertyEditPost'])->name('MyPropertiesUpdate');
        Route::get('/agencies/my-properties/assign/{id}', [AgentController::class, 'MyPropertiesAssign'])->name('MyPropertiesAssign');
        Route::post('/agencies/my-properties/assign/{id}', [AgentController::class, 'StoreMyPropertiesAssign'])->name('StoreMyPropertiesAssign');
        Route::post('/agencies/my-properties/assign/{id}', [AgentController::class, 'StoreMyProjectAssign'])->name('StoreMyProjectAssign');
        Route::get('/agencies/properties-hard-delete/{id}', [PropertyController::class, 'HardDeleteProperty'])->name('agent.HardDeleteProperty');
        //Profile End

        Route::get('/agencies/my-project/', [AgentController::class, 'MyProject'])->name('MyProject');
        Route::get('/agencies/my-project/create', [AgentController::class, 'MyProjectCreate'])->name('MyProjectCreate');
        Route::post('/agencies/project-create-post', [ProjectController::class, 'createProjectPost'])->name('agency.createProjectPost');
        Route::get('/agencies/my-project/edit/{id}', [AgentController::class, 'MyProjectEdit'])->name('MyProjectEdit');
        Route::post('/agencies/project-edit-post/{id}', [ProjectController::class, 'createProjectEditPost'])->name('agent.createProjectEditPost');
        Route::get('/agencies/my-projects/assign/{id}', [AgentController::class, 'MyProjectsAssign'])->name('MyProjectsAssign');
        Route::post('/agencies/my-projects/assign/{id}', [AgentController::class, 'StoreMyProjectsAssign'])->name('StoreMyProjectsAssign');
        Route::get('/agencies/project-hard-delete/{id}', [ProjectController::class, 'HardDeleteProject'])->name('agent.HardDeleteProject');

        Route::get('/agencies/inbox', [AgentController::class, 'MyInbox'])->name('MyInbox');
        Route::post('/agencies/status/save', [AgentController::class, 'MessageStatus'])->name('MessageStatus');

        Route::get('tanents/create/{email}/{name}', [TanentController::class, 'tanents_create'])->name('tanents.create');
        Route::post('tanents/store', [TanentController::class, 'tanents_store'])->name('tanents.store');
        Route::post('service/providers/store', [TanentController::class, 'service_providers_store'])->name('service.providers.store');

        // Agents Features Start
        Route::get('agencies/features/list/', [AgentfeaturesController::class, 'agentsFeaturesList'])->name('agentsFeaturesList');
        Route::get('agencies/features/add/', [AgentfeaturesController::class, 'agentsFeaturesAdd'])->name('agentsFeaturesAdd');
        Route::post('agencies/features/post/', [AgentfeaturesController::class, 'agentsFeaturesPost'])->name('agentsFeaturesPost');
        Route::get('agencies/features/edit/{id}', [AgentfeaturesController::class, 'agentsFeaturesEdit'])->name('agentsFeaturesEdit');
        Route::post('agencies/features/update/{id}', [AgentfeaturesController::class, 'agentsFeaturesUpdate'])->name('agentsFeaturesUpdate');
        Route::get('agencies/features/delete/{id}', [AgentfeaturesController::class, 'agentsFeaturesDelete'])->name('agentsFeaturesDelete');
        // Agents Features End

        // Agent Categories Start
        Route::get('agencies/categories/list', [AgentcategoriesController::class, 'index'])->name('Agentcatgories.index');
        Route::get('agencies/categories/create', [AgentcategoriesController::class, 'create'])->name('Agentcatgories.create');
        Route::post('agencies/categories/store', [AgentcategoriesController::class, 'store'])->name('Agentcatgories.store');
        Route::get('agencies/categories/edit/{id}', [AgentcategoriesController::class, 'edit'])->name('Agentcatgories.edit');
        Route::post('agencies/categories/update/{id}', [AgentcategoriesController::class, 'update'])->name('Agentcatgories.update');
        Route::get('agencies/categories/{id}/delete', [AgentcategoriesController::class, 'destroy'])->name('Agentcatgories.delete');
        // Agent Categories End

        // Agent Facility Start
        Route::get('agencies/facilities/list', [AgentfacilityController::class, 'index'])->name('Agentfacility.index');
        Route::get('agencies/facilities/create', [AgentfacilityController::class, 'create'])->name('Agentfacility.create');
        Route::post('agencies/facilities/store', [AgentfacilityController::class, 'store'])->name('Agentfacility.store');
        Route::get('agencies/facilities/edit/{id}', [AgentfacilityController::class, 'edit'])->name('Agentfacility.edit');
        Route::post('agencies/facilities/update/{id}', [AgentfacilityController::class, 'update'])->name('Agentfacility.update');
        Route::get('agencies/facilities/{id}/delete', [AgentfacilityController::class, 'destroy'])->name('Agentfacility.delete');

        // Agent Facility End

        // Agent Landlord Start
        Route::get('agencies/landlord/list/', [LandlordController::class, 'index'])->name('Landlord.index');
        Route::get('agencies/landlord/create/', [LandlordController::class, 'create'])->name('Landlord.create');
        Route::post('agencies/landlord/store/', [LandlordController::class, 'store'])->name('Landlord.store');
        Route::get('agencies/landlord/{id}/edit/', [LandlordController::class, 'edit'])->name('Landlord.edit');
        Route::post('agencies/landlord/{id}/update/', [LandlordController::class, 'update'])->name('Landlord.update');
        Route::get('agencies/landlord/{id}/show/', [LandlordController::class, 'show'])->name('Landlord.show');
        Route::get('agencies/landlord/{id}/delete/', [LandlordController::class, 'destroy'])->name('Landlord.destroy');
        // Agent Landlord End

        // Tenant Create Start
        Route::get('agencies/tenants/', [TanentController::class, 'AgentTenant'])->name('AgentTenant');
        Route::get('agencies/tenant/show/{id}', [TanentController::class, 'AgentTenantShow'])->name('AgentTenantShow');
        Route::get('agencies/stuff/show/{id}', [TanentController::class, 'AgentTenantShow'])->name('AgentStuffShow');
        Route::get('agencies/staff/{id}/edit/', [TanentController::class, 'AgentTenantEdit'])->name('AgentStaffEdit');
        Route::get('agencies/tenant/{id}/edit/', [TanentController::class, 'AgentTenantEdit'])->name('AgentTenantEdit');
        Route::get('agencies/service/providers/{id}/edit/', [TanentController::class, 'AgentTenantEdit'])->name('AgentServiceEdit');
        Route::get('agencies/tenant/{id}/destroy/', [TanentController::class, 'AgentTenantDestroy'])->name('AgentTenantDestroy');
        // Tenant Create End

        // Agent Service Request Start
        Route::get('agencies/tenant/services/requests', [ServicerequestController::class, 'index'])->name('services.agent.index');
        Route::get('agencies/tenant/services/delete/{id}/', [ServicerequestController::class, 'destroy'])->name('services.agent.destroy');
        Route::get('agencies/services/request/view/{id}', [ServicerequestController::class, 'show'])->name('services.agent.show');
        Route::get('agencies/update/status/{id}', [ServicerequestController::class, 'updateStatus'])->name('expense.agent.update.status');
        // Agent Service Request End

        // Expense Starts

        Route::post('agencies/create/edit', [ExpenseController::class, 'update'])->name('expense.agent.update');
        Route::get('agencies/create/delete/{id}', [ExpenseController::class, 'destroy'])->name('expense.agent.destroy');
        // Expense End

        // Contracts Start
        Route::get('agencies/contracts/', [ContractController::class, 'contracts'])->name('contracts.agent.index');
        Route::get('agencies/contracts/view/{id}', [ContractController::class, 'show'])->name('contracts.agent.show');
        Route::get('agencies/contracts/remove/{code}/{id}', [ContractController::class, 'remove'])->name('contracts.agent.remove');
        // Contracts End

        // Users Roles and Permission Start
        Route::get('agencies/users/', [UserController::class, 'agentUsers'])->name('users.agent.index');
        Route::post('agencies/users/', [UserController::class, 'agentUsersUpdate'])->name('users.agent.update');
        Route::get('agencies/users/create', [UserController::class, 'createnewuser'])->name('users.agent.create');
        // Users Roles and Permission End\

        // Tenant Message Start
        Route::get('/tenant-messages', [TenantmessageController::class, 'index'])->name('tenant.message.index');
        Route::get('/messages/{name}/{id}', [TenantmessageController::class, 'openCoversation'])->name('tenant.message.openCoversation');
        // Tenant Message End

        // Agent Rent Details Start
        Route::get('/agent/rent/transaction', [RentControllerController::class, 'allTransactions'])->name('agent.transaction.history');
        Route::post('/agent/withdraw/', [WithdrawController::class, 'withdraw'])->name('agent.transaction.withdraw');
        Route::get('/agent/all/withdraw/', [WithdrawController::class, 'withdrawRequests'])->name('agent.transaction.withdraw.requests');
        // Agent Rent Details End

        // Offline Paid Start
        Route::get('/agent/offline/paid/{property_id}', [PaymentController::class, 'paymentOffline'])->name('agent.offline.payment');
        // Offline Paid End

        // Connect Stripe End
        Route::get('/connecting/stripe', [ConnectstripeController::class, 'connection'])->name('stripe.connect');
        Route::get('/agent/connect/stripe/success', [ConnectstripeController::class, 'successConnected'])->name('stripe.connect.success');
        // Connect Stripe Start
    });


    Route::get('/my-package-history', [AgentController::class, 'packageHistory'])->name('packageHistory');
    Route::post('subscription/cancel/{id}', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    Route::post('subscription/resume/{id}', [SubscriptionController::class, 'resume'])->name('subscription.resume');



});

Route::post('/messages/sent/{id}', [TenantmessageController::class, 'messageSentPost'])->name('tenant.message.messageSentPost');
Route::get('/logout', function () {
    $id = Auth::id();
    Auth::logout();
    ActivityHappened::dispatch($id, 'User has loged out.');
    return redirect('/login');
})->name('logout');

// FontPages Start

Route::get('properties/all',[PageController::class, 'properties_lists'])->name('properties_lists');
// Route::get('properties/{slug}',[PageController::class, 'Details_property'])->name('Details_property');
Route::get('projects/all',[PageController::class, 'projects_lists'])->name('projects_lists');
Route::get('agencies/all',[PageController::class, 'agencies_lists'])->name('agencies_lists');
Route::get('blogs/all',[PageController::class, 'blogs_lists'])->name('blogs_lists');
Route::get('contact',[PageController::class, 'contact'])->name('contact');
Route::post('contact-post',[ContactController::class, 'contactSend'])->name('contactSend');
Route::get('blog/{slug}',[PageController::class, 'blog_details'])->name('blog_details');
Route::get('agenency/{id}',[PageController::class, 'agenency_details'])->name('agenency_details');
Route::post('agenency/message/sent',[AgenciesmessageController::class, 'agenency_message'])->name('agenency_message');
Route::get('properties/view/{slug}',[PageController::class, 'properties_view'])->name('properties_view');
Route::get('projects/view/{slug}',[PageController::class, 'projects_view'])->name('projects_view');

Route::get('properties/filter', [PageController::class, 'properties_filter'])->name('properties_filter');
Route::get('projects/filter', [PageController::class, 'projects_filter'])->name('projects_filter');

Route::get('properties/search', [PageController::class, 'properties_search'])->name('properties_search');

Route::get('properties-city/{city}/', [PageController::class, 'properties_city_wise'])->name('properties_city_wise');
// FontPages End

Route::post('homeSubscribe', [HomeController::class, 'homeSubscribe'])->name('homeSubscribe');

Route::get('aboutUs', [PageController::class, 'about_us'])->name('pages.aboutUs');
Route::get('termsConditons', [PageController::class, 't_and_c'])->name('pages.t&c');
Route::get('privacyPolicy', [PageController::class, 'privacy_policy'])->name('pages.privacyPolicy');
Route::group(['middleware' =>'auth'], function () {
  //Payment Start
  Route::get('/dashboard/agent/select-package', [PaymentController::class, 'package_index'])->name('package_index');
  Route::post('/dashboard/agent/select-package-post', [PaymentController::class, 'checkout'])->name('package_payment');
  // Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
  Route::post('checkout',[PaymentController::class, 'afterpayment'])->name('checkout.credit-card');
  //Payment End

  // Packages And Subcription Start
  // Route::get('plans',[PlanController::class, 'index'])->name('plans.index');
  Route::get('/plan/{plan}',[PlanController::class, 'show'])->name('plans.show');
  Route::post('/subscription',[SubscriptionController::class, 'create'])->name('subscription.create');
});

// Tenant Route Start
Route::group(['middleware' => ['auth', 'tenant']], function () {
    Route::get('/tanent-dashbord',[TanentController::class, 'TanentDashboard'])->name('TanentDashboard');
    Route::get('/my-docs',[DocumentsController::class, 'tenant_doscs'])->name('tenant_doscs');

    // //Profile Start
    Route::get('/tanent-settings-profile', [TanentController::class, 'tanentProfile'])->name('tanent.profile');
    Route::put('/tanent-profile-information/{userId}', [TanentController::class, 'updateProfileInformation'])->name('update.tanent.profile.information');
    Route::put('/tanent-profile-socialMedia/{userId}', [TanentController::class, 'updateProfileSocialMedia'])->name('update.tanent.profile.socialMedia');
    Route::put('/tanent-profile-password/{userId}', [TanentController::class, 'updateProfilePassword'])->name('update.tanent.profile.password');
    // //Profile End

    Route::get('/tanents/properties', [TanentController::class, 'properties_index'])->name('tanents.properties.index');
    Route::get('/tanents/projects', [TanentController::class, 'projects_index'])->name('tanents.projects.index');

    // Services Request Start
    Route::get('/tanents/view/service-request', [ServicerequestController::class, 'index'])->name('services.request.index');
    Route::get('/tanents/create/new-service-request', [ServicerequestController::class, 'create'])->name('services.request.create');
    Route::post('/tanents/services/request/send', [ServicerequestController::class, 'store'])->name('services.request.store');
    Route::get('/tanents/services/request/view/{id}', [ServicerequestController::class, 'show'])->name('services.request.show');
    // Services Request End

    // Message Start
    Route::get('/inbox/{name}/{id}', [TenantmessageController::class, 'tenantIndex'])->name('tenant.message.tenantIndex');
    // Message End

    // Rent Payment Start
    Route::get('/rent/payment/{property_id}', [PaymentController::class, 'tenantRentPayment'])->name('tenant.payments.rentpay');
    Route::get('/rent/transactions/', [RentControllerController::class, 'allTransactions'])->name('tenant.payments.history');
    // Rent Payment End


    // Contracts Start
    Route::get('tenant/contracts/', [ContractController::class, 'contracts'])->name('contracts.tenant.index');
    Route::get('tenant/contracts/view/{id}', [ContractController::class, 'show'])->name('contracts.tenant.show');
    // Contracts End



});
Route::get('/tanents/commnets/cancel/{id}', [CommentserviceController::class, 'cancel'])->name('services.comments.cancel');
Route::post('/tanents/commnets/post', [CommentserviceController::class, 'store'])->name('services.comments.store');


Route::group(['middleware' => ['auth', 'servicerequest']], function () {
  Route::get('/service-providers/services', [ServicerequestController::class, 'servicesForServiceProviders'])->name('servicesForServiceProviders');
  Route::get('agencies/tenant/services/delete/{id}/', [ServicerequestController::class, 'destroy'])->name('services.agent.destroy');
  Route::get('services/request/request/view/{id}', [ServicerequestController::class, 'show'])->name('services.services.show');
  Route::get('services/update/status/{id}', [ServicerequestController::class, 'updateStatus'])->name('expense.services.update.status');

  Route::get('/services-settings-profile', [AgentController::class, 'agentProfile'])->name('services.profile');
  Route::put('/services-profile-information/{userId}', [AgentController::class, 'updateProfileInformation'])->name('update.service.profile.information');
  Route::put('/agent-profile-socialMedia/{userId}', [AgentController::class, 'updateProfileSocialMedia'])->name('update.agent.profile.socialMedia');
  Route::put('/services-profile-password/{userId}', [AgentController::class, 'updateProfilePassword'])->name('update.agent.profile.password');
  Route::get('/service-settings-profile', [AgentController::class, 'agentProfile'])->name('agent.service.profile.settings');
  Route::put('/service-profile-information/{userId}', [AgentController::class, 'updateProfileInformation'])->name('update.agent.profile.information');
});

// Route::get('/purchase', function (Request $request) {
//       $stripe = new Stripe(env('STRIPE_SECRET'));
//       $token = $stripe->tokens()->create([
//           'card' => [
//               'number' => $request->get('cardnumber'),
//               'exp_month' => $request->get('ccExpiryMonth'),
//               'exp_year' => $request->get('ccExpiryYear'),
//               'cvc' => $request->get('cvv'),
//           ],
//       ]);
//
//       $charge = $stripe->charges()->create([
//           'card' => $token['id'],
//           'currency' => 'USD',
//           'amount' => 10,
//           'description' => 'Transcription Service',
//           'capture' => 'true',
//           'statement_descriptor' => "cheaptranscription.io",
//       ]);
//
// });

require __DIR__.'/auth.php';
