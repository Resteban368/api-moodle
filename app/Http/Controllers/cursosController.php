<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cursos;
use Illuminate\Support\Facades\Validator;

class cursosController extends Controller
{
     //metodo index para sacar todas las categorias
    public function index(){
    $cursos = Cursos::all()->load('category');
    return response()->json(
      [
          'code'=>200,
          'status'=>'success',
          'cursos'=>$cursos
          ],200);
    }

 //metodo para obtener un curso en concreto
    public function show($id){
        $curso = Cursos::find($id)->load('category');
        //comrobar si es un objeto
        if(is_object($curso)){
            $data = [
                'code'=>200,
                'status'=>'success',
                'curso'=>$curso
            ];
        }else{
            $data = [
                'code'=>404,
                'status'=>'error',
                'message'=>'El curso no existe'
            ];
        }
        return response()->json($data,$data['code']);
    }


//metodo para tener todos los cursos de una categoria
public function getCursoByCategory($id){
    $post = Cursos::where('category',$id)->get();
    return response()->json(
        [
            'code'=>200,
            'status'=>'success',
            'cursos'=>$post
        ],200);
}
//metodo para tener todos los cursos de un usuario


}