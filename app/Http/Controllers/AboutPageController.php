<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Facades\Image;

class AboutPageController extends Controller
{
    public function AboutPage(){
        $aboutpage = About::find(1);
        return view('admin.home_slide.about_page_all', compact('aboutpage'));
    }

    public function UpdateAbout(Request $request){
        if ($request->file('home_slide')){
            $image = $request->file('home_slide');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$image_name);
            $save_url =  'upload/home_slide/'.$image_name;

            About::findOrFail($request->id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'home_slide' => $save_url,
            ]);
            $notification = array(
                'message' => 'home slide updated with image',
                'alert-type ' => 'success',
            );

            return redirect()-> back()->with($notification);
        }
        else{
            About::findOrFail($request->id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'video_url' => $request->video_url,

            ]);
            $notification = array(
                'message' => 'home slide updated without image',
                'alert-type ' => 'success',
            );
            return redirect()-> back()->with($notification);
        }
    }


}
