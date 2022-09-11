<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class userController extends Controller
{

    public function update($id,Request $request)
    {
        //recoger los datos por post
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        if (!empty($params_array)) {
            //validar los datos
            $validate = validator::make($params_array, [
                'email'      => 'required',
                'phone1'    => 'required', 
                //token formado por letras
            ]);
            //quitar los campos que no quiero actualizar
            unset($params_array['id']);
            unset($params_array['username']);
            unset($params_array['password']);
            // unset($params_array['email']);
            unset($params_array['firstname']);
            unset($params_array['lastname']);
            //actualizar usuario en la bbdd
            $user_update = User::where('id',$id)->update($params_array);
            //devolver array con resultado
            $data = array(
                'code' => 200,
                'status' => 'success',
                'message' => 'Usuario Actualizado',
                'changes' => $params_array
            );
        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'El usuario no esta identificado'
            );
        }
        return response()->json($data, $data['code']);
    }


//metodo para traer un usuario en especifico
    public function show($id){
        $user = User::find($id);
        //comrobar si es un objeto
        if(is_object($user)){
            $data = [
                'code'=>200,
                'status'=>'success',
                'user'=>$user
            ];
        }else{
            $data = [
                'code'=>404,
                'status'=>'error',
                'message'=>'El usuario no existe'
            ];
        }
        return response()->json($data,$data['code']);
    }

    //metodo para traer todos los usuarios
    public function index(){
        $users = User::all();
        return response()->json(
          [
              'code'=>200,
              'status'=>'success',
              'users'=>$users
              ],200);
    }

   



}
