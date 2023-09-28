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

    public function index(){
        $company = Company::all();
        return response()->json([
            'status'=>true,
            'msg'=>'Consulta Exitosa',
            'response' => $company]
            , 200);
    }

    public function store(Request $request){
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

    public function show(Company $company){  
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully',
            'response' => $company]
            , 200);
    }

    public function showData(Request $request){
        $company = Company::find($request->input('id'));
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully Company',
            'response' => $company]
            , 200);
    }

    public function update(Request $request){
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

        $company= Company::find($request->id);
        $company->update($request->input());

        return response()->json([
            'status'=>true,
            'msg'=>'Record UPDATED successfully',
            'response' => $company]
            , 200);
    }

    public function destroy(Request $request){
        $company= Company::find($request->id);
        $company->delete();
        return response()->json([
            'status'=>true,
            'msg'=>'Record DELETED successfully',
            'response' => $company]
            , 200);
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
