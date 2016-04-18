<?php

Route::get('/','WelcomeCtrl@_welcome');

//welcome controller
Route::get('buysell','WelcomeCtrl@gotoBuySell');

//BuySell controller
Route::post('doSearch','BuySellCtrl@doSearch');

Route::get('test','WelcomeCtrl@test');