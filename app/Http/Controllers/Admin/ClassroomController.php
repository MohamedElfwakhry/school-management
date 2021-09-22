<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classrooms = Classroom::with('grade')->get();
        $grades = Grade::all();
        return view('dashboard.classrooms.index',compact(['classrooms','grades']));
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
    public function store(Request $request)
    {
        /*if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->route('classrooms')->with(['error' => 'حدث خط']);
        }
        return $request;*/
        try {
            $List_Classes = $request->List_Classes;
            foreach ($List_Classes as $classroom){
                $classrooom = new Classroom();
                $classrooom-> name = $classroom['name'];
                $classrooom->grade_id = $classroom['grade_id'];
                $classrooom->save();

            }

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
        $classroom = Classroom::find($request->id);
        if (!$classroom) {
            return redirect()->route('classrooms')->with(['error'=>'هذا الصف غير موجود']);

        }
        //update data
        $classroom->update($request->all());

        return redirect()->route('classrooms')->with(['success'=>'تم التحديث بنجاح']);
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
