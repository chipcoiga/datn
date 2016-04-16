<?php


Route::get('/','Welcome\Welcome@_welcome');
Route::get('searchkey','Welcome\Welcome@_searchAction');
Route::get('gotopostBuySell','Welcome\Welcome@gotoPostBuySell');
Route::get('postBuySell','Welcome\Welcome@_postBuySell');
Route::get('test','Welcome\Welcome@test');