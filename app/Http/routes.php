<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('/','WelcomeCtrl@gotoWelcome');
	Route::get('gotoWelcome','WelcomeCtrl@gotoWelcome');
	Route::get('gotobuysell','WelcomeCtrl@gotobuysell');
	Route::get('gotopostbuysell','WelcomeCtrl@gotoPostBuySell');
	Route::get('gotoshare','WelcomeCtrl@gotoshare');
	Route::get('gotofindLost','WelcomeCtrl@gotofindLost');

	//BuySell controller
	Route::post('doSearch','BuySellCtrl@doSearch');
	Route::get('viewDetail','BuySellCtrl@viewDetail');
	Route::get('share','BuySellCtrl@doDetail');


	//PostBuySellCtrl
	Route::post('dopostproduct','PostBuySellCtrl@dopostproduct');

	//DetailProductCtrl
	Route::post('getProductDetail','DetailProductCtrl@getProductDetail');

	//Common
	Route::post('dologin','WelcomeCtrl@dologin');
	Route::post('doregister','WelcomeCtrl@doregister');
	Route::get('dologout','WelcomeCtrl@dologout');

	//Admin
	Route::get('domanagement','AdminCtrl@domanagement');
	Route::post('getListPostFirstTime','AdminCtrl@getListPostFirstTime');
	Route::post('doactionaccept','AdminCtrl@doactionaccept');
	Route::post('load_byType','AdminCtrl@load_byType');
});
