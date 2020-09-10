<?php

Route::auth();
Route::get('/', 'HomepageController@showHomepage');

Route::get('/rut', 'PagesController@showRutView');
Route::get('/nap', 'PagesController@showNapView');
Route::get('/chuyen', 'PagesController@showChuyenView');
Route::get('/walletmenu', 'PagesController@showWalletMenuView');
Route::get('/tangHM', 'PagesController@showTangHMView');
Route::get('/contact', 'PagesController@showContactView');
Route::post('/getContact', 'PagesController@getContactForm');
Route::get('/setting', 'PagesController@showSettingView');





Route::get('/user', 'HomeController@index');
Route::get('/user/edit', 'HomeController@edit');


Route::get('/nap', 'DepositController@deposit');

Route::get('/uocmuon', [ 'as' => 'uocmuon', 'uses' => 'UocMuonController@giaodienUocMuon']);
Route::any('/danguocmuon', [ 'as' => 'danguocmuon', 'uses' => 'UocMuonController@danguocmuon']);
     
// admin route 
Route::get('admin/login', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@showLoginForm']);
Route::post('admin/login', ['as'  => 'postlogin', 'uses' =>'Admin\AuthController@login']);

//cai dat ti le
Route::get('admin/caidat', ['as'  => 'getcaidat', 'uses' =>'Admin\SettingController@showCaiDat']);
Route::post('admin/getcaidat', ['as'  => 'getcaidat', 'uses' =>'Admin\SettingController@getCaiDat']);

//cai dat rut
Route::get('admin/caidatrut', ['as'  => 'getcaidatrut', 'uses' =>'Admin\SettingController@showCaiDatRut']);
Route::post('admin/caidatrut', ['as'  => 'getcaidat', 'uses' =>'Admin\SettingController@CaiDatRut']);

// cai dat tang han muc
Route::get('admin/caidatthm', ['as'  => 'getcaidatthm', 'uses' =>'Admin\SettingController@showCaiDatTHM']);
Route::post('admin/postcaidatthm', ['as'  => 'postcaidatthm', 'uses' =>'Admin\SettingController@CaiDatTHM']);

//cai dat mlm
Route::get('admin/caidatmlm', ['as'  => 'getcaidatmlm', 'uses' =>'Admin\SettingController@showCaiDatMLM']);
Route::post('admin/postcaidatmlm', ['as'  => 'postcaidatmlm', 'uses' =>'Admin\SettingController@CaiDatMLM']);

//quan ly thanh vien
Route::get('admin/quanlythanhvien', ['as'  => 'getcaidatmlm', 'uses' =>'Admin\UserController@showQuanLyThanhVien']);

//quan ly f1
Route::get('admin/quanlyf1', ['as'  => 'getf1', 'uses' =>'Admin\UserController@showF1']);



Route::get('admin/password/reset', ['as'  => 'getreser', 'uses' =>'Admin\AuthController@email']);
Route::get('admin/edit', ['as'  => 'getedit', 'uses' =>'Admin\UserController@showEdit']);
Route::get('admin/delete', ['as'  => 'getdelete', 'uses' =>'Admin\UserController@delete']);
Route::post('admin/postedit', ['as'  => 'postedit', 'uses' =>'Admin\UserController@Edit']);
Route::get('admin/logout', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@logout']);



// Route::get('/', ['as'  => 'index', 'uses' =>'PagesController@index']);
// cart - oder
Route::get('gio-hang', ['as'  => 'getcart', 'uses' =>'PagesController@getcart']);
// them vao gio hang
Route::get('gio-hang/addcart/{id}', ['as'  => 'getcartadd', 'uses' =>'PagesController@addcart']);
Route::get('gio-hang/update/{id}/{qty}-{dk}', ['as'  => 'getupdatecart', 'uses' =>'PagesController@getupdatecart']);
Route::get('gio-hang/delete/{id}', ['as'  => 'getdeletecart', 'uses' =>'PagesController@getdeletecart']);
Route::get('gio-hang/xoa', ['as'  => 'getempty', 'uses' =>'PagesController@xoa']);

// tien hanh dat hang
Route::get('dat-hang', ['as'  => 'getoder', 'uses' =>'PagesController@getoder']);
Route::post('dat-hang', ['as'  => 'postoder', 'uses' =>'PagesController@postoder']);
// category
Route::get('/{cat}', ['as'  => 'getcate', 'uses' =>'PagesController@getcate']);
Route::get('/{cat}/{id}-{slug}', ['as'  => 'getdetail', 'uses' =>'PagesController@detail']);

Route::resource('payment', 'PayMentController');
