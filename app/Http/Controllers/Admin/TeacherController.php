<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = Teacher::with(['grade','classroom'])->get();
        return view('dashboard.teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('dashboard.teachers.create',compact(['grades']));
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
        }*/
        try {
            $teacher = new Teacher();
            $teacher-> name = $request->name;
            $teacher-> email = $request->email;
            $teacher-> password = Hash::make($request->password);
            if($image=$request->photo){

                $teacher->photo=$request->photo;
            }
            $teacher->classroom_id = $request->classroom_id;
            $teacher->grade_id =$request->grade_id;
            $teacher->save();
            return redirect()->route('teachers')->with(['success'=>'تم التحديث بنجاح']);
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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function getClassrooms(Request $request){
        $classrooms = Classroom::where('grade_id',$request->id)->get();
        return view('dashboard.teachers.classroom',compact('classrooms'));
    }
}
