<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Quize;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExamController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        $exams = Exam::all();
        return view('dashboard.exams.index',compact(['teachers','exams']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $grades = Grade::with('classroom')->get();
        $teachers= Teacher::all();
        $subjects = Subject::all();
        return view('dashboard.exams.create',compact(['grades','teachers','subjects']));
    }


    public function store(Request $request)
    {
        /*if (isset($request->validator) && $request->validator->fails()) {
            return redirect()->route('classrooms')->with(['error' => 'حدث خط']);
        }*/
        try {

            $exam = new Exam();
            $exam-> name = $request->name;
            $exam-> teacher_id = $request->teacher_id;
            $exam-> grade_id = $request->grade_id;
            $exam->points =$request->points;
            $exam->time =$request->time;
            $exam->subject_id = $request->subject_id;
            $exam->save();
            $List_Classes = $request->List_Classes;
            foreach ($List_Classes as $classroom){
                $quize = new Quize();
                $quize -> question = $classroom['question'] ;
                $quize -> answer1 = $classroom['answer1'] ;
                $quize -> answer2 = $classroom['answer2'] ;
                $quize -> answer3 = $classroom['answer3'] ;
                $quize -> answer4 = $classroom['answer4'] ;
                $quize -> right_answer = $classroom['right_answer'] ;
                $quize -> points = $classroom['points'] ;
                $quize -> exam_id = $exam->id ;

                $quize->save();
            }

            return redirect()->route('exams.create')->with(['success'=>'تم التحديث بنجاح']);
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
        return view('dashboard.teachers.getclassroom',compact('classrooms'));
    }
    public function getClassroom(Request $request){
        $classrooms = Classroom::where('grade_id',$request->id)->get();
        return view('dashboard.teachers.classroom',compact('classrooms'));
    }

}
