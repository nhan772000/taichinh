<?php


namespace App\Http\Controllers\Admin;


use App\Admin_users;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use  Cart, Datetime;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showQuanLyThanhVien()
    {
        $users = DB::table('users')
                    ->join('main_wallet','users.id', '=', 'main_wallet.main_wallet_ofuser')
                    ->join('eco_wallet','users.id', '=', 'eco_wallet.eco_wallet_ofuser')
                    ->join('ext_wallet','users.id', '=', 'ext_wallet.ext_wallet_ofuser')
                    ->select('users.*','main_wallet.main_wallet_point','eco_wallet.eco_wallet_point','ext_wallet.ext_wallet_point')
                    ->get();
        return  view('back-end.quanlythanhvien',['users'=>$users]);
    }
    public function showEdit(Request $request)
    {
        $user = DB::table('users')->where('id', $_GET['id'])->first();

        return view('back-end.edit',['user'=>$user]);

    }
    public function Edit()
    {
         $affected = DB::table('users')
               ->where('id', $_POST['id'])
               ->update(['name' => $_POST['name'],
                        'user_username' => $_POST['userName'],
                        'email' => $_POST['email'],
                        'user_current_address' => $_POST['address'],
                        'user_level' => $_POST['level'],
                        'user_status' => $_POST['status']
                        ]);
       return redirect('/admin/quanlythanhvien');
        
    }
    public function delete()
    {
        DB::table('users')->where('id', '=', $_GET['id'])->delete();
        return redirect('/admin/quanlythanhvien');
    }
    public function showF1(){
        $idCha = $_GET['id'];
        $users = DB::table('users')
                ->join('main_wallet','users.id', '=', 'main_wallet.main_wallet_ofuser')
                ->join('eco_wallet','users.id', '=', 'eco_wallet.eco_wallet_ofuser')
                ->join('ext_wallet','users.id', '=', 'ext_wallet.ext_wallet_ofuser')
                ->select('users.*','main_wallet.main_wallet_point','eco_wallet.eco_wallet_point','ext_wallet.ext_wallet_point')
                ->where('id_ref', $idCha)
                ->get();
        return view('back-end.quanlyf1', ['users' => $users, 'idCha' => $idCha]);
    }
}
