<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\home_slide;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    public function HomeSlider(){

        $homeslide = home_slide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));

    }

    public function UpdateSlide(Request $request){

        $slide_id = $request ->id;

        if($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);

            $save_url =  'upload/home_slide/'.$name_gen;

            home_slide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,
            ]);
            $notification = array(
                'message' => 'home slide updated with image',
                'alert-type ' => 'success',
            );

            return redirect()-> back()->with($notification);
        }
        else{
            home_slide::findOrFail($slide_id)->update([
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
