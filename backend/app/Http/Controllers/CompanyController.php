<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        return response()->json([
            'status'=>true,
            'msg'=>'Consulta Exitosa',
            'data' => $company]
            , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $rules = ['name'=>'required|string|min:3|max:100'];
        $validator = \Validator::make($request->input());
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'data' => $validator->errors()->all()]
                , 400);
        }

        $company = new Company($request->input());
        $company->save();

        return response()->json([
            'status'=>true,
            'msg'=>'Record created successfully',
            'data' => $company]
            , 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $rules = ['name'=>'required|string|min:3|max:100'];
        $validator = \Validator::make($request->input());
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'data' => $validator->errors()->all()]
                , 400);
        }

        $company->update($request->input());

        return response()->json([
            'status'=>true,
            'msg'=>'Record updated successfully',
            'data' => $company]
            , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
