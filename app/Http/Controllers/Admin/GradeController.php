<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $grades = Grade::all();
      return view('dashboard.grades.index',compact('grades'));
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
          $List_Classes = $request->List_Classes;
          foreach ($List_Classes as $classroom){
              $grade = new Grade();
              $grade -> name_ar = $classroom['name_ar'] ;
              $grade -> name_en = $classroom['name_en'];

              $grade->save();
          }

          return redirect()->route('grades')->with(['success'=>'تم التحديث بنجاح']);
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

      $grade = Grade::find($request->id);
      return view('dashboard.grades.edit',compact('grade'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(GradeRequest $request)
  {
      $grade = Grade::find($request->id);
      if (!$grade) {
          return redirect()->route('grades')->with(['error'=>'هذا الصف غير موجود']);

      }
      //update data
      $grade->update($request->all());

      return redirect()->route('grades')->with(['success'=>'تم التحديث بنجاح']);
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
          Grade::whereIn('id',$request->id)->delete();
      } catch (\Exception $e) {
          return response()->json(['message'=>'Failed']);
      }
      return response()->json(['message'=>'Success']);
  }

}

?>
