<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\forum;

class ForumController extends Controller
{
    //metodo index para sacar todos los foros
    public function index(){
        $forums = forum::all();
        return response()->json(
            [
                'code'=>200,
                'status'=>'success',
                'forums'=>$forums
            ],200);
    }

    //metodo show para sacar un foro
    public function show($id){
        $forum = forum::find($id);
        //comrobar si es un objeto
        if(is_object($forum)){
            $data = [
                'code'=>200,
                'status'=>'success',
                'forum'=>$forum
            ];
        }else{
            $data = [
                'code'=>404,
                'status'=>'error',
                'message'=>'El foro no existe'
            ];
        }
        return response()->json($data,$data['code']);
    }

    
}
