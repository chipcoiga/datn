<?php

Route::get('/','WelcomeCtrl@_welcome');

//welcome controller
Route::get('buysell','WelcomeCtrl@gotoBuySell');

//BuySell controller
Route::post('doSearch','BuySellCtrl@doSearch');
Route::get('viewDetail','BuySellCtrl@viewDetail');
Route::get('share','BuySellCtrl@doDetail');

Route::get('test','WelcomeCtrl@test');