<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class PatientController extends Controller
{
   

    public function register(Request $request)
    {   
        try{
                 $patient = Patient::create($request->all());
                 return response()->json(['msg'=>'Patient Created','patient' => $patient]);
             }catch(QueryException $e){
                 return response()->json(['msg'=>'Failed','err' => $e->getMessage()]);

    }
}
