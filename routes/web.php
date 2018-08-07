<?php

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

// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/', function () {
//         return view('layouts.welcome');
//     });
// });

Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'SearchController@autocomplete'));

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::post('searchUser', 'HomeController@searchUser')->name('searchUser');

Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/intern_diary', 'HomeController@intern_diary')->name('intern_diary');

Route::get('/login_register', function () {
        return view('layouts.guest');
})->name('login_register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'SettingsController@index');
Route::post('/settings', array(
    'as' => 'settings',
    'uses' => 'SettingsController@update'
));

// Posts
Route::get('/posts/list', 'PostsController@fetch');
Route::post('/posts/new', 'PostsController@create');
Route::post('/posts/delete', 'PostsController@delete');
Route::post('/posts/like', 'PostsController@like');
Route::post('/posts/likes', 'PostsController@likes');
Route::post('/posts/comment', 'PostsController@comment');
Route::post('/posts/comments/delete', 'PostsController@deleteComment');
Route::get('/post/{id}', 'PostsController@single');

// Search
Route::get('/search', 'HomeController@search');


// Groups
Route::get('/groups', 'GroupController@index');
Route::get('/group/{id}', 'GroupController@group');
Route::get('/group/{id}/stats', 'GroupController@stats');


// Follow
Route::post('/follow', 'FollowController@follow');
Route::get('/followers/pending', 'FollowController@pending');
Route::post('/follower/request', 'FollowController@followerRequest');
Route::post('/follower/denied', 'FollowController@followDenied');

// Relatives
Route::get('/relatives/pending', 'RelativesController@pending');
Route::post('/relative/delete', 'RelativesController@delete');
Route::post('/relative/request', 'RelativesController@relativeRequest');

// Nearby
Route::get('/nearby', 'NearbyController@index');

//About me
Route::get('/about-me', 'AboutMeCtrl@index');
Route::resource('aboutMe', 'AboutMeCtrl');

//Placement
Route::get('/placement', 'PlacementCtrl@index');
Route::resource('my-placement', 'PlacementCtrl');

//Experience
Route::get('/experience', 'ExperienceCtrl@index');
Route::resource('my-experience', 'ExperienceCtrl');
//Experience
Route::get('/contact', 'ContactCtrl@index');
Route::resource('my-contact', 'ContactCtrl');

// Messages
Route::get('/direct-messages', 'MessagesController@index');
Route::get('/direct-messages/show/{id}', 'MessagesController@index');
Route::post('/direct-messages/chat', 'MessagesController@chat');
Route::post('/direct-messages/send', 'MessagesController@send');
Route::post('/direct-messages/new-messages', 'MessagesController@newMessages');
Route::post('/direct-messages/people-list', 'MessagesController@peopleList');
Route::post('/direct-messages/delete-chat', 'MessagesController@deleteChat');
Route::post('/direct-messages/delete-message', 'MessagesController@deleteMessage');
Route::post('/direct-messages/notifications', 'MessagesController@notifications');

// Find Location
Route::get('/find-my-location', 'FindLocationController@index');
Route::get('/save-my-location', 'FindLocationController@save');
Route::get('/save-my-location2', 'FindLocationController@save2');

// Profile
Route::get('/{username}', 'ProfileController@index');
//
Route::get('/{username}/about-me', 'ProfileController@viewInputedInfo');
Route::get('/{username}/placement', 'ProfileController@viewInputedInfo');
Route::get('/{username}/experience', 'ProfileController@viewInputedInfo');
Route::get('/{username}/contact', 'ProfileController@viewInputedInfo');
Route::post('/{username}/upload/profile-photo', 'ProfileController@uploadProfilePhoto');
Route::post('/{username}/upload/cover', 'ProfileController@uploadCover');
Route::post('/{username}/save/information', 'ProfileController@saveInformation');
Route::get('/{username}/following', 'ProfileController@following');
Route::get('/{username}/followers', 'ProfileController@followers');
Route::post('/{username}/save/hobbies', 'ProfileController@saveHobbies');
Route::post('/{username}/save/relationship', 'ProfileController@saveRelationship');
