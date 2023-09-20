<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function getUsersList(Request $request){
        $users = User::select('id, name, email, status')
                    ->where('id_company','=',$request->company_id)
                    ->get();
        
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully',
            'data' => $users]
            , 200);
    }

    public function getUser(Request $request){
        $user = User::find($request->id);
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully',
            'data' => $user]
            , 200);
    }

    public function cretedUser(Request $request){
        $validator = Validator::make($request->input(),
                        [
                            'name'=>'required|string|min:3|max:100',
                            'email'=> 'required|email'
                    ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'data' => $validator->errors()->all()]
                , 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->email);
        $user->id_company = $request->id_company;
        $user->id_unitop = $request->id_unitop;
        $user->id_typeact = $request->id_typeact;
        $user->rutrif = $request->rutrif;
        $user->position = $request->position;
        if ($user->save()){
            return response()->json([
                'status'=>true,
                'msg'=>'Query successfully',
                'data' => $user]
                , 201);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Error create User',
                'data' => $user]
                , 400);
        }

        
    }
}
