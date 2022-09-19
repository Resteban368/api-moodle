<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\forumDiscussion;

class ForumDiscussionController extends Controller
{
    //metodo index para sacar todas las discusiones
    public function index(){
        $discussions = forumDiscussion::all();
        return response()->json(
            [
                'code'=>200,
                'status'=>'success',
                'discussions'=>$discussions
            ],200);
    }
   
    //metodo show para sacar una discusion
    public function show($id){
        $discussion = forumDiscussion::find($id);
        //comrobar si es un objeto
        if(is_object($discussion)){
            $data = [
                'code'=>200,
                'status'=>'success',
                'discussion'=>$discussion
            ];
        }else{
            $data = [
                'code'=>404,
                'status'=>'error',
                'message'=>'La discusion no existe'
            ];
        }
        return response()->json($data,$data['code']);
    }
}
