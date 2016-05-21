<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('/','WelcomeCtrl@gotoWelcome');
	Route::get('gotoWelcome','WelcomeCtrl@gotoWelcome');
	Route::get('gotobuysell','WelcomeCtrl@gotobuysell');
	Route::get('gotopostbuysell','WelcomeCtrl@gotoPostBuySell');
	Route::get('gotoshare','WelcomeCtrl@gotoshare');
	Route::get('gotofindLost','WelcomeCtrl@gotofindLost');
	Route::get('chatpage','WelcomeCtrl@chatpage');
	Route::get('gotochatpage','WelcomeCtrl@gotochatpage');

	//BuySell controller
	Route::post('doSearch','BuySellCtrl@doSearch');
	Route::get('viewDetail','BuySellCtrl@viewDetail');
	Route::get('share','BuySellCtrl@doDetail');


	//PostBuySellCtrl
	Route::post('dopostproduct','PostBuySellCtrl@dopostproduct');
	//getcurentUser
	Route::post('getcurentUserMobile','PostBuySellCtrl@getcurentUserMobile');

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

	//chatpage
	Route::post('getListUserChat','ChatCtrl@getListUserChat');
	Route::post('showConversation','ChatCtrl@showConversation');
	Route::post('sendMessage','ChatCtrl@sendMessage');

});
