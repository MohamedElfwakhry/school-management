<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParentStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::guard('parent')->check()!=null){
            $parent = ParentStudent::find(Auth::guard('parent')->user()->id);
            return view('dashboard.parents.edit',compact('parent'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClassroomRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->route('classrooms')->with(['error' => 'حدث خط']);
        }
        try {
            $classroom = new Classroom();
            $classroom-> name = $request ->name;
            $classroom->grade_id = $request->grade_id;
            $classroom->save();

            return redirect()->route('classrooms')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $exception){
            return response()->json(['message'=>$exception]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request)
    {
        $classroom = Classroom::find($request->id);
        $grades = Grade::all();

        return view('dashboard.classrooms.edit',compact(['classroom','grades']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $parent = ParentStudent::find($request->id);
        $parent->name = $request->name;
        $parent->email = $request->email;
        $parent->photo=$request->photo;

        $parent->save();
        return redirect()->route('students-classroom')->with(['success'=>'تم التحديث بنجاح']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete(Request $request)
    {
        try{
            Classroom::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);

    }
}
