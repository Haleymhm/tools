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
            'response' => $users]
            , 200);
    }

    public function getUser(Request $request){
        $user = User::find($request->id);
        return response()->json([
            'status'=>true,
            'msg'=>'Query successfully',
            'response' => $user]
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
                'response' => $validator->errors()->all()]
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
                'response' => $user]
                , 201);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Error create User',
                'response' => $user]
                , 400);
        }
    }

    public function updateUser(Request $request){
        $validator = Validator::make($request->input(),
                        [
                            'name'=>'required|string|min:3|max:100',
                            'email'=> 'required|email'
                    ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'msg'=>'Error en consulta',
                'response' => $validator->errors()->all()]
                , 400);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_company = $request->id_company;
        $user->id_unitop = $request->id_unitop;
        $user->id_typeact = $request->id_typeact;
        $user->rutrif = $request->rutrif;
        $user->position = $request->position;
        $user->view = $request->view;

        if ($user->save()){
            return response()->json([
                'status'=>true,
                'msg'=>'Query successfully',
                'response' => $user]
                , 200);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Error create User',
                'response' => $user]
                , 400);
        }
    }

    public function changePasswordUser(Request $request){
        $user = User::find($request->id);

        $user->password = bcrypt($request->password);
        if ($user->save()){
            return response()->json([
                'status'=>true,
                'msg'=>'Query successfully',
                'response' => []]
                , 200);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Error Change password',
                'response' => []]
                , 400);
        }
    }

    public function activateUser(Request $request){
        $user = User::find($request->id);
        if($request->status == 'I'){
            $user->status = User::USER_INACTIVE;
        }else{ $user->status = User::USER_ACTIVE;}
        
        if ($user->save()){
            return response()->json([
                'status'=>true,
                'msg'=>'Query successfully',
                'response' => []]
                , 200);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Error Change status',
                'response' => []]
                , 400);
        }
    }
}
