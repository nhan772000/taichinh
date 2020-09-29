<?php
use Illuminate\Support\Facades\Route;


Route::auth();

//setting user cash back
Route::get('/setting', 'UsersController@getSettingCashBack');
Route::post('/setting', 'UsersController@postSettingCashBack');


//route by Kira
Route::get('/notice/readNotice/{id}','UsersController@readNotice');

Route::get('/userinfo/sendOTPM','WalletMainController@sendOTPM');
Route::get('/notice','UsersController@getNotice');

Route::get('/sendOTP/{email}','WalletMainController@sendOTP');
Route::get('/chuyen/{id}', 'UsersController@getChuyenQR');
Route::get('/scanner', function() {         
  return view('qrScanner');});       	
Route::get('/introduce', function() {         
return view('introduce');});       	
  
//truong
Route::get('/ngay', 'UsersController@ngay');

Route::get('/signup', 'SignUpController@signup');
Route::get('/', 'HomepageController@showHomepage');


//-----------------------chuyển------------------
//Route::get('/capnhat', 'UsersController@capnhat');

Route::get('/info-user-recei/{user_id}', 'UsersController@infoUserRecei');
Route::get('/chuyen', 'UsersController@getChuyen');


Route::post('/chuyen', 'UsersController@postChuyen');
Route::post('/xacnhan-chuyen', 'UsersController@xacNhanChuyen');

//kết thúc---------------chuyển-----------------



//hiển thị giao diện nhập email
Route::get('/passwordreset', 'UsersController@passwordReset');
//xử lý dữ liệu và trả về thông tin cho người dùng kiểm tra
Route::post('/passwordreset', 'UsersController@postPasswordReset');

//gửi mã xác nhận về mail
Route::get('/passwordreset/send-email/{remember_token}/{user_id}', 'UsersController@passwordResetSendMail');

Route::post('/passwordreset/end-get-password', 'UsersController@endGetPassword');

Route::get('/bb', 'UsersController@bb');

//kết thúc-------------------lấy lại mật khẩu------------------------



//------------cập nhật, hiển thị và xác minh thông tin người dùng -------------

//Gửi link xác minh email về mail của user
Route::get('/verify', 'UsersController@verify');

//Khi user truy cập vào link xác minh từ email
Route::get('/verify/receive-email/{user_verify_code}', 'UsersController@receive_email');


//hiển thị thông tin
Route::get('/userinfo', 'UsersController@userInfo');

//cập nhật thông tin người dùng
Route::post('/userinfo', 'UsersController@updateUserInfo');

//kết thúc------------cập nhật, hiển thị và xác minh thông tin người dùng -------------



// ----------------Xử lý đăng nhập, đăng ký, đăng xuất người dùng ------------

//hiển thị giao diện đăng nhập, đăng ký
Route::get('/register/{user_introduction}', 'UsersController@register');
Route::get('/register', 'UsersController@register');

Route::get('/login', 'UsersController@login');

//đăng xuất
Route::get('/logout', 'UsersController@logOut');


//kiểm tra đăng ký tài khoản
Route::post('/register', 'UsersController@checkUserRegister');

//kiểm tra đăng nhập người dùng
Route::post('/login', 'UsersController@checkUserLogin');

//Kiểm tra nhận thưởng
Route::get('/tangqua' , 'SettingController@getGift');

// kết thúc----------------Xử lý đăng nhập, đăng ký, đăng xuất người dùng ------------






//send mail
//Route::get('/get-password-send-mail', 'UsersController@send_mail');





//-----------------------------------------------
Route::get('/', 'HomepageController@showHomepage');
Route::get('/contact', 'ContactController@showContact');

Route::get('/rut', 'PagesController@showRutView');
Route::get('/nap', 'PagesController@showNapView');
//Route::get('/chuyen', 'PagesController@showChuyenView');
Route::get('/walletmenu', 'PagesController@showWalletMenuView');
Route::get('/tangHM', 'PagesController@showTangHMView');
Route::get('/contact', 'PagesController@showContactView');

Route::post('/phattrienthitruong','UserController@Phattrienthitruong');

//walletmain controller
Route::post('form-Nap','WalletMainController@NapTransaction');
Route::post('form-Rut','WalletMainController@RutTransaction');
Route::post('form-Chuyen','WalletMainController@ChuyenTransaction');
Route::get('/wallet', 'WalletMainController@getWalletManager');
Route::get('/wallet/walletdetail/{type}', 'WalletMainController@getWalletDetail');

Route::get('/transfer', 'WalletMainController@transfer');
Route::get('/pttt', 'WalletMainController@getPTTT');
Route::get('/postpttt', 'WalletMainController@postPTTT');


Route::get('/user','HomeController@index');
Route::get('/user/edit', 'HomeController@edit');

Route::get('/transaction', 'TransactionController@showTransactionHistory');


Route::get('/uocmuon', [ 'as' => 'uocmuon', 'uses' => 'UocMuonController@giaodienUocMuon']);
Route::any('/danguocmuon', [ 'as' => 'danguocmuon', 'uses' => 'UocMuonController@danguocmuon']);

// admin route 
Route::get('admin/login', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@showLoginForm']);
Route::post('admin/login', ['as'  => 'postlogin', 'uses' =>'Admin\AuthController@login']);
Route::get('admin/password/reset', ['as'  => 'getreser', 'uses' =>'Admin\AuthController@email']);
Route::get('admin/logout', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@logout']);

//Xử lý admin transaction
Route::get('admin/transactionmanager', 'Admin\TransactionManagerController@ShowAllTransaction');
Route::get('admin/transactionmanager/acceptTransaction/{arr_id}', 'Admin\TransactionManagerController@acceptTransaction');
Route::get('admin/transactionmanager/cancelTransaction/{arr_id}', 'Admin\TransactionManagerController@cancelTransaction');
Route::get('admin/transactionmanager/deleteTransaction/{arr_id}', 'Admin\TransactionManagerController@deleteTransaction');
Route::any('admin/transactionmanager/editTransaction/{id}', 'Admin\TransactionManagerController@getEditTransaction');

//Xử lý deposit transaction
Route::get('admin/transactionmanager/deposit', 'Admin\TransactionManagerController@getDepositTransaction');
Route::any('admin/transactionmanager/deposit/editTransaction/{id}', 'Admin\TransactionManagerController@getEditTransaction');
Route::get('admin/transactionmanager/deposit/acceptTransaction/{id}', 'Admin\TransactionManagerController@acceptTransaction');
Route::get('admin/transactionmanager/deposit/cancelTransaction/{id}', 'Admin\TransactionManagerController@cancelTransaction');
Route::get('admin/transactionmanager/deposit/deleteTransaction/{id}', 'Admin\TransactionManagerController@deleteTransaction');

//Xử lý withdraw transactio
Route::get('admin/transactionmanager/withdraw', 'Admin\TransactionManagerController@getWithdrawTransaction');
Route::any('admin/transactionmanager/withdraw/editTransaction/{id}', 'Admin\TransactionManagerController@getEditTransaction');
Route::get('admin/transactionmanager/withdraw/acceptTransaction/{id}', 'Admin\TransactionManagerController@acceptTransaction');
Route::get('admin/transactionmanager/withdraw/cancelTransaction/{id}', 'Admin\TransactionManagerController@cancelTransaction');
Route::get('admin/transactionmanager/withdraw/deleteTransaction/{id}', 'Admin\TransactionManagerController@deleteTransaction');
Route::any('/form-editTransaction', 'Admin\TransactionManagerController@postEditTransaction');

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

// --------------------------------cac cong viec trong admin (back-end)--------------------------------------- 
Route::group(['middleware' => 'admin'], function () {
      Route::group(['prefix' => 'admin'], function() {
          
       	Route::get('/home', function() {         
         return view('back-end.home');       	
       }

     );   
          


       // -------------------- quan ly danh muc----------------------
       	Route::group(['prefix' => 'danhmuc'], function() {
           Route::get('add',['as'        =>'getaddcat','uses' => 'CategoryController@getadd']);
           Route::post('add',['as'       =>'postaddcat','uses' => 'CategoryController@postadd']);

           Route::get('/',['as'       =>'getcat','uses' => 'CategoryController@getlist']);
           Route::get('del/{id}',['as'   =>'getdellcat','uses' => 'CategoryController@getdel'])->where('id','[0-9]+');
           
           Route::get('edit/{id}',['as'  =>'geteditcat','uses' => 'CategoryController@getedit'])->where('id','[0-9]+');
           Route::post('edit/{id}',['as' =>'posteditcat','uses' => 'CategoryController@postedit'])->where('id','[0-9]+');
    	});
         // -------------------- quan ly danh muc--------------------
        Route::group(['prefix' => '/sanpham'], function() {
           Route::get('/{loai}/add',['as'        =>'getaddpro','uses' => 'ProductsController@getadd']);
           Route::post('/{loai}/add',['as'       =>'postaddpro','uses' => 'ProductsController@postadd']);

           Route::get('/{loai}',['as'       =>'getpro','uses' => 'ProductsController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdellpro','uses' => 'ProductsController@getdel'])->where('id','[0-9]+');
           
           Route::get('/{loai}/edit/{id}',['as'  =>'geteditpro','uses' => 'ProductsController@getedit'])->where('id','[0-9]+');
           Route::post('/{loai}/edit/{id}',['as' =>'posteditpro','uses' => 'ProductsController@postedit'])->where('id','[0-9]+');
      });
       // -------------------- quan ly danh muc-----------------------------
        Route::group(['prefix' => '/news'], function() {
           Route::get('/add',['as'        =>'getaddnews','uses' => 'NewsController@getadd']);
           Route::post('/add',['as'       =>'postaddnews','uses' => 'NewsController@postadd']);

           Route::get('/',['as'       =>'getnews','uses' => 'NewsController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdellnews','uses' => 'NewsController@getdel'])->where('id','[0-9]+');
           
           Route::get('/edit/{id}',['as'  =>'geteditnews','uses' => 'NewsController@getedit'])->where('id','[0-9]+');
           Route::post('/edit/{id}',['as' =>'posteditnews','uses' => 'NewsController@postedit'])->where('id','[0-9]+');
      });
        // -------------------- quan ly đơn đặt hàng--------------------
        Route::group(['prefix' => '/donhang'], function() {;

           Route::get('',['as'       =>'getpro','uses' => 'OdersController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdeloder','uses' => 'OdersController@getdel'])->where('id','[0-9]+');
           
           Route::get('/detail/{id}',['as'  =>'getdetail','uses' => 'OdersController@getdetail'])->where('id','[0-9]+');
           Route::post('/detail/{id}',['as' =>'postdetail','uses' => 'OdersController@postdetail'])->where('id','[0-9]+');
      });
        // -------------------- quan ly thong tin khach hang--------------------
        Route::group(['prefix' => '/khachhang'], function() {;

           Route::get('',['as'       =>'getmem','uses' => 'UsersController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdelmem','uses' => 'UsersController@getdel'])->where('id','[0-9]+');
           
           Route::get('/edit/{id}',['as'  =>'geteditmem','uses' => 'UsersController@getedit'])->where('id','[0-9]+');
           Route::post('/edit/{id}',['as' =>'posteditmem','uses' => 'UsersController@postedit'])->where('id','[0-9]+');
      });
       // -------------------- quan ly thong nhan vien--------------------
        Route::group(['prefix' => '/nhanvien'], function() {;

           Route::get('',['as'       =>'getnv','uses' => 'Admin_usersController@getlist']);
           Route::get('/del/{id}',['as'   =>'getdelnv','uses' => 'Admin_usersController@getdel'])->where('id','[0-9]+');
           
           Route::get('/edit/{id}',['as'  =>'geteditnv','uses' => 'Admin_usersController@getedit'])->where('id','[0-9]+');
           Route::post('/edit/{id}',['as' =>'posteditnv','uses' => 'Admin_usersController@postedit'])->where('id','[0-9]+');
      });
      // ---------------van de khac ----------------------
    });     
});


// LICH SU GIAO DICH
Route::get('/transaction', 'TransactionController@showTransaction')->name('transaction.index');


Route::get('/user', 'HomeController@index');
Route::get('/user/edit', 'HomeController@edit');



Route::get('/uocmuon', [ 'as' => 'uocmuon', 'uses' => 'UocMuonController@giaodienUocMuon']);
Route::any('/danguocmuon', [ 'as' => 'danguocmuon', 'uses' => 'UocMuonController@danguocmuon']);

