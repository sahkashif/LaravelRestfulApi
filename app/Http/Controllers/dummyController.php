<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\dummy;
use App\Http\Resources\dummyResource;

class dummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dummies=dummy::paginate(10);

        return dummyResource::collection($dummies);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dummy=$request->isMethod('put') ? dummy::findorfail($request->dummy_id) : new dummy;

        $dummy->id=$request->input('id');
        $dummy->context=$request->input('context');
        $dummy->body=$request->input('body');

        if($dummy->save())
        {
            return new dummyResource($dummy);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dummy=dummy::findorfail($id);
        
        return new dummyResource($dummy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dummy=dummy::findorfail($id);
        
        if($dummy->delete())
        {
            return new dummyResource($dummy);
        }
        
    }
}
