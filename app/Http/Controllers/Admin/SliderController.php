<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index() 
    {
        $sliders = Slider::all();
        return view('backend.pages.Slider.Slider', compact('sliders'));
    }

    public function create()
    {
        return view('backend.pages.Slider.add');
    }

    public function store(Request $request)
    {
        $file = $request->file('image');
        $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
        $image_path = $file->move('storage/slider', $filename);

        Slider::create([
            'headline' => $request->headline,
            'image' => $image_path,
        ]);

        return redirect()->route('admin.slider')->with('success', 'Slider created');
    }

    public function edit(String $id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.pages.Slider.edit', compact('sliders')); 
    }

    public function update(Request $request, $id)
    {
        // get id 
        $sliders = Slider::findOrFail($id);

        // check kalo gambarnya udah ada
        if($request->hasFile('image')) {
            // upload gambar baru
            // $image = $request->file('image');
            $file = $request->file('image');
            $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            $image_path = $file->move('storage/slider', $filename);

            // delete gambar lama
            Storage::delete('storage/slider' . $sliders->image);

            // update slider dengan gambar baru
            $sliders->update([
                'headline' => $request->headline,
                'image' => $image_path
            ]);
        } else {
            // update slider tanpa gambar
            $sliders->update([
                'headline' => $request->headline,
            ]);
        }

        return redirect()->route('admin.slider')->with('success', 'Slider updated');
    }

    public function destroy($id)
    {
        $sliders = Slider::findOrFail($id);
        $sliders->delete();

        return redirect()->route('admin.slider')->with('success', 'Slider Deleted');
    }

}
