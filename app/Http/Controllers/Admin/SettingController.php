<?php


namespace App\Http\Controllers\Admin;


use App\Admin_users;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB, Cart, Datetime;
use App\Setting;
use App\SettingRut;
use App\SettingTHM;
use App\SettingMLM;
class SettingController extends Controller
{
    public function showCaiDat()
    {
        //lay du lieu
        $result = Setting::first();

        return  view('back-end.caidatadmin',['result' => $result]);
    }
    public function showCaiDatRut()
    {
        $result = SettingRut::first();
        
        return  view('back-end.caidatrutadmin',['result' => $result]);
    }
    public function ShowCaiDatTHM(Request $request)
    {
        $result = SettingTHM::first();
        return  view('back-end.caidatTHMadmin',['result' => $result]);
    }
    public function ShowCaiDatMLM(Request $request)
    {
        $result = SettingMLM::first();
        return  view('back-end.caidatMLMadmin',['result' => $result]);
    }
    public function getCaiDat(Request $request)
    {
        $request = $request->all();
       $setting = Setting::find(1);
       $setting->setting_rate_point = $request['diem'];
       $setting->setting_rate_phigd = $request['phi'];
       $setting->setting_rate_vichinh = $request['VC'];
       $VTK = 10 - $request['VC'];
       $setting->setting_rate_vitietkiem= $VTK;
       $setting -> save();
       return redirect('/admin/caidat');
    }
    public function CaiDatRut(Request $request)
    {
        $request = $request->all();
        $setting = SettingRut::find(1);
        $setting->setting_naprut_phi = $request['phirut'];
        $setting->setting_naprut_toithieu = $request['toithieurut'];
        $setting->setting_naprut_hm0 = $request['hanmuc0'];
        $setting->setting_naprut_hm2 = $request['hanmuc2'];
        $setting->setting_naprut_hm4 = $request['hanmuc4'];
        $setting->setting_naprut_hm5 = $request['hanmuc5'];
        $setting -> save();
       return redirect('/admin/caidatrut');
    }
    public function CaiDatTHM(Request $request)
    {
        $request = $request->all();
        $setting = SettingTHM::find(1);
        $setting->setting_tanghm_rate = $request['TL'];
        $setting -> save();
        return redirect('/admin/caidatthm');
    }
    public function CaiDatMLM(Request $request)
    {
        $request = $request->all();
        $setting = SettingMLM::find(1);
        $setting->F1 = $request['f1'];
        $setting->F2 = $request['f2'];
        $setting->F3 = $request['f3'];
        $setting->F4 = $request['f4'];
        $setting->F5 = $request['f5'];
        $setting->F6 = $request['f6'];
        $setting->F7 = $request['f7'];
        $setting->F8 = $request['f8'];
        $setting->F16 = $request['f16'];
        $setting -> save();
        return redirect('/admin/caidatmlm');
    }
    
}
