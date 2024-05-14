<?php

use App\Controllers\SubjectAllocation;
use CodeIgniter\Router\RouteCollection;
use  App\Modules\Breadcrumbs\Breadcrumbs;
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
        $routes->get('logout', 'AuthController::logout');
       /*  $routes->match(['get','post'],'section-add', 'SectionController::section_add');
        $routes->match(['get','post'],'section-view', 'SectionController::section_view');
        $routes->match(['get','post'],'section-store', 'SectionController::store_data'); */

        $routes->group('master', static function ($routes) {

            $routes->match(['get', 'post'],'class/', 'MasterController::classMaster');
            $routes->match(['get', 'post'],'class/(:segment)', 'MasterController::classMaster/$1');
            $routes->match(['get', 'post'],'class/(:segment)/(:segment)', 'MasterController::classMaster/$1/$2');

            $routes->match(['get', 'post'],'section/', 'MasterController::section');
            $routes->match(['get', 'post'],'section/(:segment)', 'MasterController::section/$1');
            $routes->match(['get', 'post'],'section/(:segment)/(:segment)', 'MasterController::section/$1/$2');

            $routes->match(['get', 'post'],'subject/', 'MasterController::subject');
            $routes->match(['get', 'post'],'subject/(:segment)', 'MasterController::subject/$1');
            $routes->match(['get', 'post'],'subject/(:segment)/(:segment)', 'MasterController::subject/$1/$2');

            $routes->match(['get', 'post'],'department/', 'MasterController::department');
            $routes->match(['get', 'post'],'department/(:segment)', 'MasterController::department/$1');
            $routes->match(['get', 'post'],'department/(:segment)/(:segment)', 'MasterController::department/$1/$2');

            $routes->match(['get', 'post'],'designation/', 'MasterController::designation');
            $routes->match(['get', 'post'],'designation/(:segment)', 'MasterController::designation/$1');
            $routes->match(['get', 'post'],'designation/(:segment)/(:segment)', 'MasterController::designation/$1/$2');
            $routes->match(['get', 'post'],'subject-allocation-list', 'MasterController::subjectAllocationList');
            $routes->match(['get', 'post'],'subject-allocation-add', 'MasterController::subjectAllocationAdd');
            

        });
        $routes->group('premission', static function ($routes) {

            $routes->match(['get', 'post'],'header/', 'PermissionController::permissionHeader');
            $routes->match(['get', 'post'],'header/(:segment)', 'PermissionController::permissionHeader/$1');
            $routes->match(['get', 'post'],'header/(:segment)/(:segment)', 'PermissionController::permissionHeader/$1/$2');


            $routes->match(['get', 'post'],'detail/', 'PermissionController::permissionDetail');
            $routes->match(['get', 'post'],'detail/(:segment)', 'PermissionController::permissionDetail/$1');
            $routes->match(['get', 'post'],'detail/(:segment)/(:segment)', 'PermissionController::permissionDetail/$1/$2');

            $routes->match(['get', 'post'],'role/', 'PermissionController::role');
            $routes->match(['get', 'post'],'role/(:segment)', 'PermissionController::role/$1');
            $routes->match(['get', 'post'],'role/(:segment)/(:segment)', 'PermissionController::role/$1/$2');
        });
        $routes->group('employee', static function ($routes){
            $routes->match(['get', 'post'],'add', 'EmployeeController::employeeAdd');
            $routes->match(['get', 'post'],'employee', 'EmployeeController::employee');
        });
        $routes->group('ajax', static function ($routes) {

            $routes->match(['get', 'post'],'get-section-by-class', 'AjaxController::getSectionByClass');
        });

       


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
