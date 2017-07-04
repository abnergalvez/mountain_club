<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

    public function index()
    {
        return view('admin.carousels.index')->with('carousels',\App\Carousel::all());
    }


    public function store(Request $request)
    {
        $photo_name = $request->file('photo_')->getClientOriginalName();
        $request->file('photo_')->move( base_path() . '/public/img/carousels', $photo_name);
        $request->request->add(['photo' => $photo_name]);
        \App\Carousel::create($request->all());
        return redirect('/carousels');
    }


    public function edit(Carousel $carousel)
    {
        return view('admin.carousels.edit')->with('carousel', $carousel);
    }


    public function update(Request $request, Carousel $carousel)
    {

        if($request->photo_)
        {
            $photo_name = $request->file('photo_')->getClientOriginalName();
            $request->file('photo_')->move( base_path() . '/public/img/carousels', $photo_name);
            $request->request->add(['photo' => $photo_name]);
        }
        else
        {
            $request->request->add(['photo' => $carousel->photo]);
        }

        $carousel->update($request->all());
        return redirect('/carousels');
    }

    public function destroy(Carousel $carousel)
    {
        $path = '/public/img/carousels/';
        \File::delete($path.$carousel->photo);
        $carousel->delete();
        return redirect('/carousels');

    }
}
