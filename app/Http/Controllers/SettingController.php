<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\MetaKeyword;
use App\Models\GeneralContact;
use App\Models\EmailConfig;

class SettingController extends Controller
{
    public function logo_edit()
    {
        return view('Dashboard.Settings.logo_edit');
    }

    public function logo_update(Request $request)
    {
        $request->validate([
            'image' => 'bail|required|file|image|mimes:png|max:1000'
        ]);

        Image::make($request->file('image'))
                ->resize(650, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save('uploads/header-logo.png', 100);

        return back();
    }

    public function metaKeywords_edit()
    {
        $metaKeywords = MetaKeyword::find(1);
        if(!$metaKeywords)
            $metaKeywords = new MetaKeyword;

        return view('Dashboard.Settings.metaKeywords_edit', ['metaKeywords' => $metaKeywords]);
    }

    public function metaKeywords_update(Request $request)
    {
        $request->validate([
            'metaKeywords' => 'bail|required|string|max:2555'
        ]);

        MetaKeyword::updateOrCreate(
            ['id' => 1],
            ['data' => $request->metaKeywords]
        );
        
        return back()->with('success', "Successfully updated");
    }

    public function generalContact_edit()
    {
        $generalContact = GeneralContact::find(1);
        if(!$generalContact)
            $generalContact = new GeneralContact;
            
        return view('Dashboard.Settings.generalContact_edit', ['generalContact' => $generalContact]);
    }

    public function generalContact_update(Request $request)
    {
        $data = $request->validate([
                'about' => 'bail|required|string|max:255',
                'address' => 'bail|required|string|max:255',
                'phone' => 'bail|required|string|max:255',
                'mail' => 'bail|required|string|max:255',
                'skype' => 'bail|nullable|string|max:255',
                'facebook' => 'bail|nullable|string|max:255',
                'twitter' => 'bail|nullable|string|max:255',
                'instagram' => 'bail|nullable|string|max:255',
                'googlePlus' => 'bail|nullable|string|max:255',
                'pinterest' => 'bail|nullable|string|max:255',
        ]);

        GeneralContact::updateOrCreate(
            ['id' => 1],
            $data
        );
        
        return back()->with('success', "Successfully updated");
    }

    public function emailConfig_edit()
    {
        $emailConfig = EmailConfig::find(1);
        if(!$emailConfig)
            $emailConfig = new EmailConfig;

        return view('Dashboard.Settings.emailConfig_edit', ['emailConfig' => $emailConfig]);
    }

    public function emailConfig_update(Request $request)
    {
        $data = $request->validate([
            'host' => 'bail|required|string|max:255',
            'port' => 'bail|required|string|max:255',
            'username' => 'bail|required|string|max:255',
            'password' => 'bail|required|string|max:255',
            'encryption' => 'bail|nullable|string|max:255',
        ]);

        EmailConfig::updateOrCreate(
            ['id' => 1],
            $data
        );
        
        return back()->with('success', "Successfully updated");
    }
}
