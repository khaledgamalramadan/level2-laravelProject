<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
         $testimonials = Testimonial::paginate(config('pagination.count'));
        return view('admin.testimonials.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.testimonials.create' , get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();
        //uoload image
        //1- get image
        $image = $request->image;
        //2- change it's name
        $imageName = time() . '_' . $image->getClientOriginalName();
        //3- move it to my project
        $image->storeAs('testimonials', $imageName, 'public');
        //4- save the image name in the database
        $data['image'] = $imageName;

        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', __('keywords.testimonial_created_successfully'));
    }

    /**
     * Display the specified resource.
     */

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            //uoload image
            // 0 delete old image
            Storage::delete('public/testimonials/' . $testimonial->image);
            //1- get image
            $image = $request->image;
            //2- change it's name
            $imageName = time() . '_' . $image->getClientOriginalName();
            //3- move it to my project
            $image->storeAs('testimonials', $imageName, 'public');
            //4- save the image name in the database
            $data['image'] = $imageName;
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', __('keywords.testimonial_updated_successfully'));

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Testimonial $testimonial)
    {
        //delete image
        Storage::delete('public/testimonials/' . $testimonial->image);
        //delete testimonial
         $testimonial->delete();
            return redirect()->route('admin.testimonials.index')->with('success', __('keywords.testimonial_deleted_successfully'));
    }
}
