<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
         $companies = Company::paginate(config('pagination.count'));
        return view('admin.companies.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.companies.create' , get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCompanyRequest $request)
    {

        $data = $request->validated();
        $data = $request->validated();
        //uoload image
        //1- get image
        $image = $request->image;
        //2- change it's name
        $imageName = time() . '_' . $image->getClientOriginalName();
        //3- move it to my project
        $image->storeAs('companies', $imageName, 'public');
        //4- save the image name in the database
        $data['image'] = $imageName;
        Company::create($data);
        return redirect()->route('admin.companies.index')->with('success', __('keywords.company_created_successfully'));
    }

    /**
     * Display the specified resource.
     */

    public function show(Company $company)
    {
        return view('admin.companies.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Company $company)
    {
        return view('admin.companies.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            //uoload image
            // 0 delete old image
            Storage::delete('public/companies/' . $company->image);
            //1- get image
            $image = $request->image;
            //2- change it's name
            $imageName = time() . '_' . $image->getClientOriginalName();
            //3- move it to my project
            $image->storeAs('companies', $imageName, 'public');
            //4- save the image name in the database
            $data['image'] = $imageName;
        }
        $company->update($data);
        return redirect()->route('admin.companies.index')->with('success', __('keywords.Service_updated_successfully'));

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Company $company)
    {
         $company->delete();
            return redirect()->route('admin.companies.index')->with('success', __('keywords.Service_deleted_successfully'));
    }
}
