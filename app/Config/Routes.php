<?php

use App\Controllers\SubjectAllocation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index', ['filter' => 'authfilter']);

$routes->get('/', 'Auth::index', ['filter' => 'noauthfilter']);

$routes->post('/signin', 'Auth::signin');

$routes->get('/logout', 'Auth::signout');

$routes->get('/profile_edit', 'User::index', ['filter' => 'authfilter']);

$routes->post('/update_profile', 'User::Profile_update', ['filter' => 'authfilter']);

$routes->get('/change_password', 'User::PasswordChange', ['filter' => 'authfilter']);

$routes->post('/setnewpass', 'User::updatePass', ['filter' => 'authfilter']);

////// class route ///////
$routes->get('/class/add', 'Classes::index', ['filter' => 'authfilter']);
$routes->post('/class/store', 'Classes::storeData', ['filter' => 'authfilter']);
$routes->get('/class/view', 'Classes::viewData', ['filter' => 'authfilter']);
$routes->get('/class/edit/(:num)', 'Classes::editData/$1', ['filter' => 'authfilter']);
$routes->post('/class/update/(:num)', 'Classes::updateData/$1', ['filter' => 'authfilter']);
$routes->get('/class/delete/(:num)', 'Classes::deleteData/$1', ['filter' => 'authfilter']);

/////// section route ///////
$routes->get('/section/add', 'Section::index', ['filter' => 'authfilter']);
$routes->post('section/store', 'Section::storeData', ['filter' => 'authfilter']);
$routes->get('/section/view', 'Section::viewData', ['filter' => 'authfilter']);
$routes->get('/section/edit/(:num)', 'Section::editData/$1', ['filter' => 'authfilter']);
$routes->post('section/update/(:num)', 'Section::updateData/$1', ['filter' => 'authfilter']);
$routes->get('section/delete/(:num)', 'Section::deleteData/$1', ['filter' => 'authfilter']);


/////// subject route ///////
$routes->get('/subject/add', 'Subject::index', ['filter' => 'authfilter']);
$routes->post('subject/store', 'Subject::storeData', ['filter' => 'authfilter']);
$routes->get('/subject/view', 'Subject::viewData', ['filter' => 'authfilter']);
$routes->get('/subject/edit/(:num)', 'Subject::editData/$1', ['filter' => 'authfilter']);
$routes->post('subject/update/(:num)', 'Subject::updateData/$1', ['filter' => 'authfilter']);
$routes->get('subject/delete/(:num)', 'Subject::deleteData/$1', ['filter' => 'authfilter']);



/////////   section allocation route //////////////
$routes->get('/subjectallocation/add', 'SubjectAllocation::index', ['filter' => 'authfilter']);
$routes->post('/subjectallocation/store', 'SubjectAllocation::storeData', ['filter' => 'authfilter']);
$routes->get('/subjectallocation/view', 'SubjectAllocation::viewData', ['filter' => 'authfilter']);


$routes->post('/get-sections', 'SubjectAllocation::getSection', ['filter' => 'authfilter']);














/////////   section allocation route //////////////
// $routes->get('/sectionallocation/add', 'SectionAllocation::index',['filter' => 'authfilter']);
// $routes->post('/sectionallocation/store', 'SectionAllocation::storeData',['filter' => 'authfilter']);
// $routes->get('/sectionallocation/view', 'SectionAllocation::viewData', ['filter' => 'authfilter']);
// $routes->get('/sectionallocation/edit/(:num)', 'SectionAllocation::editData/$1', ['filter' => 'authfilter']);
// $routes->post('sectionallocation/update/(:num)', 'SectionAllocation::updateData/$1', ['filter' => 'authfilter']);
// $routes->get('sectionallocation/delete/(:num)' , 'SectionAllocation::deleteData/$1', ['filter' => 'authfilter']);
