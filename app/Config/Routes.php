<?php

use App\Controllers\SubjectAllocation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/', 'AuthController::index');
// $routes->group('/',['filter'=>'authFilter','namescape' => 'App\Controller'], static function
// ($routes){
//     $routes->get('/dashboard', 'Home::index');
//     // $routes->get('/', 'AuthController::index');
//     $routes->post('signin', 'AuthController::signin');
//     $routes->get('logout', 'AuthController::signout');
// });

// back-panel

$routes->group('back-panel', static function ($routes) {
    $routes->match(['get','post'],'/', 'AuthController::auth');
    $routes->group('',['filter'=>'authFilter'], static function ($routes) {
        $routes->match(['get','post'],'dashboard', 'DashboardController::dashboard');
        $routes->match(['get','post'],'section-add', 'SectionController::section_add');
        $routes->match(['get','post'],'section-view', 'SectionController::section_view');
        $routes->match(['get','post'],'section-store', 'SectionController::store_data');


    });

    /* $routes->match(['get','post'],'/profile_edit', 'User::index', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/update_profile', 'User::Profile_update', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/change_password', 'User::PasswordChange', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/setnewpass', 'User::updatePass', ['filter' => 'authfilter']);

    ////// class route ///////
    $routes->match(['get','post'],'/class/add', 'Classes::index', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/class/store', 'Classes::storeData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/class/view', 'Classes::viewData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/class/edit/(:num)', 'Classes::editData/$1', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/class/update/(:num)', 'Classes::updateData/$1', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/class/delete/(:num)', 'Classes::deleteData/$1', ['filter' => 'authfilter']);

    /////// section route ///////
    $routes->match(['get','post'],'/section/add', 'Section::index', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'section/store', 'Section::storeData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/section/view', 'Section::viewData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/section/edit/(:num)', 'Section::editData/$1', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'section/update/(:num)', 'Section::updateData/$1', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'section/delete/(:num)', 'Section::deleteData/$1', ['filter' => 'authfilter']);


    /////// subject route ///////
    $routes->match(['get','post'],'/subject/add', 'Subject::index', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'subject/store', 'Subject::storeData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/subject/view', 'Subject::viewData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/subject/edit/(:num)', 'Subject::editData/$1', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'subject/update/(:num)', 'Subject::updateData/$1', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'subject/delete/(:num)', 'Subject::deleteData/$1', ['filter' => 'authfilter']); */



    /////////   section allocation route //////////////
    $routes->match(['get','post'],'/subjectallocation/add', 'SubjectAllocation::index', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/subjectallocation/store', 'SubjectAllocation::storeData', ['filter' => 'authfilter']);
    $routes->match(['get','post'],'/subjectallocation/view', 'SubjectAllocation::viewData', ['filter' => 'authfilter']);


    $routes->match(['get','post'],'/get-sections', 'SubjectAllocation::getSection', ['filter' => 'authfilter']);
});














/////////   section allocation route //////////////
// $routes->get('/sectionallocation/add', 'SectionAllocation::index',['filter' => 'authfilter']);
// $routes->post('/sectionallocation/store', 'SectionAllocation::storeData',['filter' => 'authfilter']);
// $routes->get('/sectionallocation/view', 'SectionAllocation::viewData', ['filter' => 'authfilter']);
// $routes->get('/sectionallocation/edit/(:num)', 'SectionAllocation::editData/$1', ['filter' => 'authfilter']);
// $routes->post('sectionallocation/update/(:num)', 'SectionAllocation::updateData/$1', ['filter' => 'authfilter']);
// $routes->get('sectionallocation/delete/(:num)' , 'SectionAllocation::deleteData/$1', ['filter' => 'authfilter']);
