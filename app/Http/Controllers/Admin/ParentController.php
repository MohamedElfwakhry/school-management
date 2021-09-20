<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParentStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $parents = ParentStudent::all();
        return view('dashboard.parents.index',compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.parents.create');
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
            $parent = new ParentStudent();
            $parent-> name = $request->name;
            $parent-> email = $request->email;
            $parent-> password = Hash::make($request->password);
            if($image=$request->photo){

                $parent->photo=$request->photo;
            }
            $parent->save();
            return redirect()->route('parents')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $exception){
            return response()->json(['message'=>$exception]);

        }
    }

    public function changePassword(Request $request){
        $parent = ParentStudent::find($request->id);

        if (Hash::check($request->oldPassword,$parent->password)) {
            // The passwords match...
            $parent->password=Hash::make($request->password);
            $parent->save();
            return redirect()->route('students-classroom')->with(['success'=>'تم التحديث بنجاح']);
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
