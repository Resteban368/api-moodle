<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class categoryController extends Controller
{
   //metodo index para sacar todas las categorias
   public function index(){
      $categories = Category::all();
      return response()->json(
        [
            'code'=>200,
            'status'=>'success',
            'categories'=>$categories
            ],200);
   }

   //metodo show para sacar una categoria
    public function show($id){
        $category = Category::find($id);
        //comrobar si es un objeto
        if(is_object($category)){
            $data = [
                'code'=>200,
                'status'=>'success',
                'category'=>$category
            ];
        }else{
            $data = [
                'code'=>404,
                'status'=>'error',
                'message'=>'La categoria no existe'
            ];
        }
        return response()->json($data,$data['code']);
    }

    //metodo para guardar una categoria
    public function store(Request $request){
        //recoger los datos por post
        $json = $request->input('json',null);
        $params = json_decode($json);
        $params_array = json_decode($json,true);

        if(!empty($params_array)){
            //validar los datos
            $validate = Validator::make($params_array,[
                'name'=>'required',
            ]);
            //guardar la categoria
            if($validate->fails()){
                $data = [
                    'code'=>400,
                    'status'=>'error',
                    'message'=>'No se ha guardado la categoria'
                ];
            }else{
                $category = new Category();
                $category->name = $params->name;
                //TODO: ACA PODEMOS PONER LOS CAMPOS MAS QUE SE REQUIERAN PONER AL CREAR LA CATEGORY
                // $category->description = $params->description;
                $category->save();

                $data = [
                    'code'=>200,
                    'status'=>'success',
                    'category'=>$category
                ];
            }
        }else{
            $data = [
                'code'=>400,
                'status'=>'error',
                'message'=>'No has enviado ninguna categoria'
            ];
        }
        return response()->json($data,$data['code']);
    }



    //metodo para actualizar una categoria
    public function update($id,Request $request){
        //recoger los datos por post
        $json = $request->input('json',null);
        $params_array = json_decode($json,true);

        if(!empty($params_array)){
            //validar los datos
            $validate = Validator::make($params_array,[
                'name'=>'required',
            ]);
            //quitar lo que no quiero actualizar
            unset($params_array['id']);
            //actualizar el registro
            $category = Category::where('id',$id)->update($params_array);
            //devolver array con resultado
            $data = [
                'code'=>200,
                'status'=>'success',
                'category'=>$params_array
            ];
        }else{
            $data = [
                'code'=>400,
                'status'=>'error',
                'message'=>'No has enviado ninguna categoria'
            ];
        }
        return response()->json($data,$data['code']);
    }

    //metodo para obetner todas las categorias padres
    public function allCtaegoryParent(Request $request){
        $category = Category::where('parent',0)->get();
        // comrobar si es un objeto
        if(is_object($category)){
            $data = [
                'code'=>200,
                'status'=>'success',
                'category'=>$category
            ];
        }else{
            $data = [
                'code'=>404,
                'status'=>'error',
                'message'=>'La categoria no existe'
            ];
        }
        return response()->json($data,$data['code']);

       

    }
}
