<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $members = Member::paginate(config('pagination.count'));
        return view('admin.members.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.members.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();
        //uoload image
        //1- get image
        $image = $request->image;
        //2- change it's name
        $imageName = time() . '_' . $image->getClientOriginalName();
        //3- move it to my project
        $image->storeAs('members', $imageName, 'public');
        //4- save the image name in the database
        $data['image'] = $imageName;
        Member::create($data);
        return redirect()->route('admin.members.index')->with('success', __('keywords.member_created_successfully'));
    }

    /**
     * Display the specified resource.
     */

    public function show(Member $member)
    {
        return view('admin.members.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Member $member)
    {
        return view('admin.members.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            //uoload image
            // 0 delete old image
            Storage::delete('public/members/' . $member->image);
            //1- get image
            $image = $request->image;
            //2- change it's name
            $imageName = time() . '_' . $image->getClientOriginalName();
            //3- move it to my project
            $image->storeAs('members', $imageName, 'public');
            //4- save the image name in the database
            $data['image'] = $imageName;
        }
        $member->update($data);
        return redirect()->route('admin.members.index')->with('success', __('keywords.member_updated_successfully'));

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Member $member)
    {
        //delete image
        Storage::delete('public/members/' . $member->image);
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', __('keywords.member_deleted_successfully'));
    }
}
