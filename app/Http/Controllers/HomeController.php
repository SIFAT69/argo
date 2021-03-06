<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Choice;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Blog;
use App\Models\GeneralContact;
use App\Models\Subscriber;

class HomeController extends Controller
{
    public function show_home()
    {
        //filters data start
        $categories = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->pluck('category')->toArray());
        $bedrooms = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->orderBy('flat_beds')->pluck('flat_beds')->toArray());
        $bathrooms = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->orderBy('flat_baths')->pluck('flat_baths')->toArray());
        $floors = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->orderBy('flat_floors')->pluck('flat_floors')->toArray());
        $minPrice = Property::where('moderation_status', 'Approved')->where('status', 1)->min('price');
        $maxPrice = Property::where('moderation_status', 'Approved')->where('status', 1)->max('price');

        $fes = Property::where('moderation_status', 'Approved')->where('status', 1)->pluck('features');
        $features = [];
        foreach($fes as $feature)
        {
            $feature = json_decode($feature, true);
            foreach($feature as $single)
            {
            $features[] = $single;
            }
        }
        $features = array_unique($features);
        //filters data end

        //Featured Properties start
        $featuredProperties = Property::where('moderation_status', 'Approved')->where('status', 1)->where('is_Featured', 'Yes')->inRandomOrder()->limit(5)->get();
        foreach($featuredProperties as $fp)
        {
            $user = User::find($fp->user_id);
            $fp->user_name = $user->name;
            $fp->user_avatar = $user->avatar;
            $fp->time = Carbon::parse($fp->created_at)->diffForHumans();
        }
        //Featured Properties End


        $cities = DB::table("cities")->where('is_featured', 'Yes')->get();
        // dd($cities);

        $choices = Choice::all();
        $testimonials = Testimonial::inRandomOrder()->limit(5)->get();
        $partners = Partner::all();

        $blogs = Blog::inRandomOrder()->limit(3)->get();
        foreach($blogs as $blog)
        {
            $user = User::find($blog->posted_by);
            $blog->poster_name = $user->name;
            $blog->poster_avatar = $user->avatar;
            $blog->time = Carbon::parse($blog->created_at)->diffForHumans();
        }

        $gContact = GeneralContact::find(1);
        if(!$gContact)
            $gContact = new GeneralContact;

        return view('welcome', compact('categories', 'bedrooms', 'bathrooms', 'floors', 'minPrice', 'maxPrice', 'features', 'featuredProperties', 'cities', 'choices', 'testimonials', 'partners', 'blogs', 'gContact'));
    }

    public function homeSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email|max:255'
        ]);

        $exist = Subscriber::where('email', $request->email)->exists();
        if($exist)
            return redirect()->route('welcome')->with('success', 'You have already subscribe');
        else
        {
            Subscriber::create(['email' => $request->email]);
            return redirect()->route('welcome')->with('success', 'You have subscribed');
        }

    }
}
