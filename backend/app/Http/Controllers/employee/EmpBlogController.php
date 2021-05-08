<?php

namespace App\Http\Controllers\employee;

use App\Models\Blog;
use App\Models\User;
use App\Models\BlogTag;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpBlogController extends Controller
{
    public function index()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $blogs=Blog::getAllBlog()->where('added_by','=',session('LoggedUser'));
        // return $blogs;
        return view('employee.dashboard.blog.index',$data)->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $categories=BlogCategory::get();
        $tags=BlogTag::get();
        $users=User::get();
        return view('employee.dashboard.blog.create',$data)->with('users',$users)->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'quote'=>'string|nullable',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|nullable',
            'tags'=>'nullable',
            'added_by'=>'required',
            'blog_cat_id'=>'required',
            'status'=>'required|in:active,inactive'
        ]);

        $blog=new Blog;
        $data=$request->all();

        $slug=Str::slug($request->title);
        $count=Blog::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;

        $tags=$request->input('tags');
        if($tags){
            $data['tags']=implode(',',$tags);
        }
        else{
            $data['tags']='';
        }
        // return $data;

        if ($request->hasFile('myfile')) {
            $file = $request->file('myfile');
            $name = $request->added_by;
            $fileName =  $name . '.' .  $file->getClientOriginalExtension();
            $request->photo->move(public_path('/upload/blog_image'), $fileName);
            if ($file->move(public_path('/upload/blog_image'), $fileName)) {
                $data['photo']=$fileName;
            } 
           
        }

        $status=$blog->fill($data)->save();
        if($status){
            request()->session()->flash('success','Blog Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('employee.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $blog=Blog::findOrFail($id);
        $categories=BlogCategory::get();
        $tags=BlogTag::get();
        $users=User::get();
        return view('employee.dashboard.blog.edit',$data)->with('categories',$categories)->with('users',$users)->with('tags',$tags)->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog=Blog::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'title'=>'string|required',
            'quote'=>'string|nullable',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|nullable',
            'tags'=>'nullable',
            'added_by'=>'nullable',
            'blog_cat_id'=>'required',
            'status'=>'required|in:active,inactive'
        ]);

        $data=$request->all();
        $tags=$request->input('tags');
        // return $tags;
        if($tags){
            $data['tags']=implode(',',$tags);
        }
        else{
            $data['tags']='';
        }
        // return $data;

        if ($request->hasFile('myfile')) {
            $file = $request->file('myfile');
            $name = $request->input('added_by');
            $fileName =  $name . '.' .  $file->getClientOriginalExtension();
            //$request->$file->move(public_path('/upload/blog_image'), $fileName);
            if ($file->move(public_path('/upload/blog_image'), $fileName)) {
                $data['photo']= $fileName;
                $status=$blog->fill($data)->save();
               
            } 
           
        }

        $status=$blog->fill($data)->save();
        if($status){
            request()->session()->flash('success','Blog Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('employee.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::findOrFail($id);
       
        $status=$blog->delete();
        
        if($status){
            request()->session()->flash('success','Blog successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Blog ');
        }
        return redirect()->route('employee.blog.index');
    }
}
