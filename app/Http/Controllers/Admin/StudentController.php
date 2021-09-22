<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\ParentStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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
            $students = Student::where('parent_id',Auth::guard('parent')->user()->id)->get();
            return view('dashboard.students.index',compact(['students']));

        }else{
            $students = Student::all();
            return view('dashboard.students.index',compact('students'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::guard('parent')->check()!=null){
            $grades = Grade::all();

            return view('dashboard.students.create',compact(['grades']));

        }else{
            $grades = Grade::all();

            $parents = ParentStudent::all();
            return view('dashboard.students.create',compact(['grades','parents']));

        }

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
            $student = new Student();
            $student-> name = $request->name;
            $student-> email = $request->email;
            $student-> password = Hash::make($request->password);
            if($image=$request->photo){

                $student->photo=$request->photo;
            }
            $student->classroom_id = $request->classroom_id;
            $student->grade_id = $request->grade_id;
            $student->parent_id = $request->parent_id;
            $student->save();
            return redirect()->route('students-classroom')->with(['success'=>'تم التحديث بنجاح']);
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
}
