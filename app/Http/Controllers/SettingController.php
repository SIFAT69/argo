<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\MetaKeyword;
use App\Models\GeneralContact;
use App\Models\EmailConfig;
use App\Models\QuickLink;
use Illuminate\Support\Facades\Auth;
use App\Events\ActivityHappened;


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
                ->save(public_path('uploads/header-logo.png'), 100);

        ActivityHappened::dispatch(Auth::id(), 'The logo has been updated.');

        return back()->with('success', 'Your logo has been updated.');
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

        ActivityHappened::dispatch(Auth::id(), 'Meta keyword has been updated.');
        
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
        
        ActivityHappened::dispatch(Auth::id(), 'The general contact has been updated.');

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

        ActivityHappened::dispatch(Auth::id(), 'The email configuration has been updated.');
        
        return back()->with('success', "Successfully updated");
    }

    public function aboutUs_edit()
    {
        $discription = QuickLink::where('link_name', 'about us')->value('description');
        return view('Dashboard.Settings.aboutUs_edit', ['description' => $discription]);
    }

    public function aboutUs_update(Request $request)
    {
        $request->validate([
            'description' => 'bail|required|string|max:5000',
        ]);

        QuickLink::updateOrCreate(
            ['link_name' => 'about us'],
            [
                'link_name' => 'about us',
                'description' => $request->description,
            ]
        );

        return redirect()->route('settings.aboutUs.edit')->with('success', 'Successfully saved');
    }

    public function tAndC_edit()
    {
        $discription = QuickLink::where('link_name', 't and c')->value('description');
        return view('Dashboard.Settings.tAndC_edit', ['description' => $discription]);
    }

    public function tAndC_update(Request $request)
    {
        $request->validate([
            'description' => 'bail|required|string|max:5000',
        ]);

        QuickLink::updateOrCreate(
            ['link_name' => 't and c'],
            [
                'link_name' => 't and c',
                'description' => $request->description,
            ]
        );

        return redirect()->route('settings.tAndC.edit')->with('success', 'Successfully saved');
    }

    public function privacyPolicy_edit()
    {
        $discription = QuickLink::where('link_name', 'privacy policy')->value('description');
        return view('Dashboard.Settings.privacyPolicy_edit', ['description' => $discription]);
    }

    public function privacyPolicy_update(Request $request)
    {
        $request->validate([
            'description' => 'bail|required|string|max:5000',
        ]);

        QuickLink::updateOrCreate(
            ['link_name' => 'privacy policy'],
            [
                'link_name' => 'privacy policy',
                'description' => $request->description,
            ]
        );

        return redirect()->route('settings.tAndC.edit')->with('success', 'Successfully saved');
    }
}
