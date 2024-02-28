<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\User;
use DB;

class CompanyController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function createCompany(Request $request){
        $rules = ['company_name'=>'required|string|min:3|max:100'];
        $validator = Validator::make($request->input(),
                        ['company_name'=>'required|string|min:3|max:100'
                    ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'response' => $validator->errors()->all()]
                , 400);
        }

        $company = new Company($request->input());
        $company->save();

        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully',
            'response' => $company]
            , 201);
    }

    public function showData(Request $request){
        $company = Company::find($request->input('id'));
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully Company',
            'response' => $company]
            , 200);
    }

    public function updateCompany(Request $request){
        try {
            $validator = Validator::make($request->input(),
                        ['company_name'=>'required|string|min:3|max:100'
                    ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'response' => $validator->errors()->all()]
                , 400);
        }

        $company= Company::find($request->input('id'));
        $company->company_rutrif = $request->input('company_rutrif');
        $company->company_name = $request->input('company_name');
        $company->company_address = $request->input('company_address');
        $company->company_telephone = $request->input('company_telephone');
        $company->company_email = $request->input('company_email');
        if ($company->save()){
            return response()->json([
                'status'=>true,
                'msg'=>'Record UPDATED successfully',
                'response' => $company]
                , 200);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'response' => '']
                , 405);
        }
        } catch (Exception $e) {
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'response' => $e->getMessage(),
                'my-request' => $request]
                , 500);
        }
    }

    public function userByCompany(Request $request){
        $users = User::where('id_company','=',$request->id)
                    ->get();
                    
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully',
            'response' => $users]
            , 200);
    }
}
