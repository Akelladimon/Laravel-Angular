<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CompanyResource
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'city' => $request->city,
            'street_address' => $request->address,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'state' => $request->state,
        ]);

        return  new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int|null $userId
     * @return CompanyResource
     */
    public function show(Request $request, int|null $userId): CompanyResource
    {
        $company = [];
        if ($userId) {
            $company = Company::where('owner_id', '=', $userId)->first();
        }

        return  new CompanyResource($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
