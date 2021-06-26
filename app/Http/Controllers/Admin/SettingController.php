<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\MailSetting;
use DB;
use Artisan;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }

    public function mail_setting(){
        $setting = Setting::first();
        return view('backend.setting.mail', compact('setting'));
    }

    
    public function update(Request $request, $id)
    {
        $old_logo = $request->old_logo;
        $old_favicon = $request->old_favicon;
        $check = $request->file('logo');
        $check2 = $request->file('favicon');
        if(!$check){
            $updatelogo =  $old_logo;
        }else{
            // unlink('public/backend/images/'.$old_logo);
            $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
            $upload = $request->logo->move(public_path('images'),$logoName);
            $updatelogo =  $logoName;
        }
        if(!$check2){
            $updateFavicon =  $old_favicon;
        }else{
            // unlink('public/backend/images/'.$old_favicon);
            $favicon = time() . '-' . $request->file('favicon')->getClientOriginalName();
            $upload = $request->favicon->move(public_path('images'),$favicon);
            $updateFavicon =  $favicon;
        }
        Setting::find($id)->update([
            'logo' => $updatelogo,
            'favicon' => $updateFavicon,
        ]);
        notify()->success("Setting Updated successfully","Success");
        return redirect()->back();
    }

    public function mailsetting(Request $r)
    {
        MailSetting::updateOrCreate(['name' => 'mailer'],['value' => $r->get('mailer')]);
        MailSetting::updateOrCreate(['name' => 'mail_host'],['value' => $r->get('mail_host')]);
        MailSetting::updateOrCreate(['name' => 'mail_port'],['value' => $r->get('mail_port')]);
        MailSetting::updateOrCreate(['name' => 'mail_encryption'],['value' => $r->get('mail_encryption')]);
        MailSetting::updateOrCreate(['name' => 'mail_username'],['value' => $r->get('mail_username')]);
        MailSetting::updateOrCreate(['name' => 'mail_password'],['value' => $r->get('mail_password')]);
        MailSetting::updateOrCreate(['name' => 'mail_from_address'],['value' => $r->get('mail_from_address')]);
        MailSetting::updateOrCreate(['name' => 'mail_from_name'],['value' => $r->get('mail_from_name')]);
        notify()->success("Mail Setting Updated successfully","Success");
        return redirect()->back();
    }
}