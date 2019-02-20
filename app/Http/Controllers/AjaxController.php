<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

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
      	
      	$status ($order==1)? 'ok':'ko';
      	$error = "database mistmatch";

      return response()->json(array('status'=> $status,'error'=>$error), 200);
   }
}


