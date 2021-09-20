<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classroom_id = Auth::guard('teacher')->user()->classroom_id;
        $blogs = Blog::where('classroom_id',$classroom_id)->with('blogImages')->paginate(10);
        return view('dashboard.blogs.index',compact('blogs'));
    }

    public function indexAll(){
        $blogs = Blog::with('blogImages')->get();
        return view('dashboard.blogs.index-all',compact('blogs'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.blogs.create');
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
            $parent = new Blog();
            $parent-> address = $request->address;
            $parent-> notes = $request->notes;
            $parent->classroom_id = Auth::guard('teacher')->user()->classroom_id;
            $parent->save();
            if($files=$request->file('images')){
                $i = 1;
                foreach($files as $file){
                    $imaage = new BlogImages();
                    $i++;
                    $image = time()+$i . '.' . $file->getClientOriginalExtension();
                    $file->move('uploads' . '/' . 'Blog', $image);
                    $imaage->image =$image;
                    $imaage->blog_id = $parent->id;
                    $imaage->save();
                }
            }
            return redirect()->route('classroom-blogs')->with(['success'=>'تم التحديث بنجاح']);
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

        $blog = Blog::find($id);
        return view('dashboard.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        try {
            $blog = Blog::find($request->id);
            $blog->update($request->all());
            return redirect()->route('classroom-blogs')->with(['success'=>'تم التحديث بنجاح']);
        }catch (\Exception $exception){
            return response()->json(['message'=>$exception]);

        }
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
