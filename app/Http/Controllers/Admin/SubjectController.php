<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades = Grade::all();
        $subjects = Subject::with('grade')->get();
        return view('dashboard.subjects.index',compact(['grades','subjects']));
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
        try {
            $subject = new Subject();

            $subject -> name = $request->name;
            $subject->save();
            $grades = $request->input('grades');
            foreach ($grades as $grade){
                $gradee = Grade::find($grade);
                $gradee -> subject()->syncWithoutDetaching($subject->id);
            }
//            $List_Classes = $request->List_Classes;
//
//            foreach ($List_Classes as $classroom) {
//                $subject = new Subject();
//
//                $subject->name = $classroom['name'];
//
//                $subject->save();
//                $grades = $classroom['grades'];
//                foreach ($grades as $grade) {
//                    $gradee = Grade::find($grade);
//
//                    $gradee->subject()->syncWithoutDetaching($subject->id);
//                }
//            }

            return redirect()->route('subjects')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $exception){
            return $exception;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
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
        $grades = Grade::all();
        $subject = Subject::with('grade')->find($request->id);
        return view('dashboard.subjects.edit',compact(['subject','grades']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $subject = Subject::find($request->id);

        $subject -> name = $request->name;
        $subject->update();

        //remove all data
        $subjeect = Subject::find($request->id);
        $subjeect -> grade()->detach();

        //update new data
        if ($grades = $request->input('grades')){
            foreach ($grades as $grade){
                $gradee = Grade::find($grade);
                $gradee -> subject()->syncWithoutDetaching($request->id);
            }
        }
        if (!$subject) {
            return redirect()->route('subjects')->with(['error'=>'هذا الصف غير موجود']);

        }
        //update data

        return redirect()->route('subjects')->with(['success'=>'تم التحديث بنجاح']);
    }


    public function delete(Request $request)
    {
        try{
            Subject::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }

}
