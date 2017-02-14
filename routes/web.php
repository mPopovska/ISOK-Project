<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'SiteController@index');
$app->get('/phones','SiteController@phones');
$app->get('/phone_details', 'SiteController@phone_details');
$app->get('/tablets', 'SiteController@tablets');
$app->get('/tablet_details', 'SiteController@tablet_details');
$app->get('/laptops','SiteController@laptops');
$app->get('/laptop_details','SiteController@laptop_details');

$app->post('/submit_phone_comment', 'SiteController@submit_phone_comment');
$app->post('/submit_tablet_comment', 'SiteController@submit_tablet_comment');
$app->post('/submit_laptop_comment', 'SiteController@submit_laptop_comment');

$app->get('/admin/review-comments', 'SiteController@display_comments');
$app->post('/admin/review-comments', 'SiteController@approve_review');
$app->post('/admin/review-tablet-comments', 'SiteController@approve_tablet_review');
$app->post('/admin/review-laptop-comments', 'SiteController@approve_laptop_review');

$app->get('/admin/insert-device', 'SiteController@display_insert_device_form');
$app->post('/admin/add-phone', 'SiteController@add_phone');
$app->post('/admin/add-tablet', 'SiteController@add_tablet');
$app->post('/admin/add-laptop', 'SiteController@add_laptop');