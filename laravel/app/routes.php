<?php

/**
 * Setup properties to be used globally by all views
 */
$globalTitle = 'SDH Bernartice nad Odrou';
View::share ( 'globalTitle', $globalTitle );

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the Closure to execute when that URI is requested.
 * |
 */
Route::get ( '/', array (
		'uses' => 'HomeController@showHomePage',
		'as' => 'home' 
) );
Route::get ( '/about', 'AboutController@showAboutPage' );
Route::get ( '/partyequipment', 'PartyEquipmentController@showEquipmentPage' );
Route::get ( '/events', array (
		'as' => 'events',
		'uses' => 'EventsController@showEventsPage' 
) );
Route::get ( '/events/archive', array (
		'as' => 'archive_events',
		'uses' => 'EventsController@showOldEventsPage' 
) );
Route::get ( '/gallery', array (
		'as' => 'gallery',
		'uses' => 'GalleryController@showGalleries' 
) );
Route::get ( '/gallery/{shortcut}', array (
		'as' => 'showgallery',
		'uses' => 'GalleryController@showGallery' 
) );
Route::get ( '/contact', array (
		'as' => 'contact',
		'uses' => 'ContactController@showContactPage' 
) );
Route::get ( '/migrate', function () {
	
	$output = Artisan::call ( 'migrate', array (
			'--force' => true 
	) );
	dd ( $output );
} );
Route::get ( '/migraterefresh', function () {
	
	$output = Artisan::call ( 'migrate:refresh', array (
			'--force' => true 
	) );
	dd ( $output );
} );
Route::get ( '/seed', function () {
	
	$output = Artisan::call ( 'db:seed', array (
			'--force' => true 
	) );
	dd ( $output );
} );

/* specify menu of the application */
Menu::make ( 'sdh_nav_bar', function ($menu) {
	$menu->add ( trans ( 'content.title_home' ) ); // planned events, photos in header, contact
	                                            // information on the bottom
	$menu->add ( trans ( 'content.title_about' ), 'about' ); // historic and general information
	$menu->add ( trans ( 'content.title_events' ), 'events' ); // list of events, passed are grey
	$menu->add ( trans ( 'content.title_gallery' ), 'gallery' ); // photographs and videos from the life
	                                                          // of firefighters
// 	$menu->add ( trans ( 'content.title_party_equipment' ), 'partyequipment' ); // list of party
	                                                                         // equipment
	$menu->add ( trans ( 'content.title_contact' ), 'contact' ); // main contacts to be used in case of
	                                                          // need
} );