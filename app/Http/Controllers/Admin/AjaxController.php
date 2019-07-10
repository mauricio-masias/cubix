<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Media;

class AjaxController extends Controller
{
    public function index(Request $request){

        $ids = json_decode(urldecode($request->input('ids')));
      
        $order = count($ids);
        foreach($ids as $id){
      		
      		$project = Project::find($id);
      		$project->project_order= $order;
      		$project->save();
        	
        	$order--;
      	}
      	
      	$status = ($order==0)? 'ok':'ko';
      	$error = "Ordering failed.";

      return response()->json(array('status'=> $status,'error'=>$error), 200);
   }

    public function newGalleryOrder(Request $request){

        $ids = json_decode(urldecode($request->input('ids')));

        $order = count($ids);
        foreach($ids as $id){

            $image = Media::find($id);
            $image->file_order= $order;
            $image->save();

            $order--;
        }

        $status =  ($order==0)? 'ok':'ko';
        $error = "Ordering failed.";

        return response()->json(array('status'=> $status,'error'=>$error.$order), 200);
    }
}


