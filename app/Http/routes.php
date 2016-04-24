<?php



//welcome controller
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

Route::get('test','WelcomeCtrl@test');