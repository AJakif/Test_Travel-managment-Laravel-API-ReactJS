<?php

namespace App\Http\Controllers\account\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Http\Request;


class BlogCommentController extends Controller
{
    public function index()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $comments=BlogComment::getAllComments();
        return view('account.dashboard.comment.index',$data)->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $blog_info=Blog::getBlogBySlug($request->slug);
        // return $post_info;
        $data=$request->all();
        $data['user_id']= $request->session()->get('LoggedUser');
        $data['status']='active';
        $data['blog_id']= $blog_info -> id;
        // return $data;
        $status=BlogComment::create($data);
        $user=User::where('type','account')->get();
        $details=[
            'title'=>"New Comment created",
            'actionURL'=>route('blog.detail',$blog_info->slug),
            'fas'=>'fas fa-comment'
        ];
        //Notification::send($user, new StatusNotification($details));
        if($status){
            request()->session()->flash('success','Thank you for your comment');
        }
        else{
            request()->session()->flash('error','Something went wrong! Please try again!!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments=BlogComment::find($id);
        if($comments){
            return view('account.comment.edit')->with('comment',$comments);
        }
        else{
            request()->session()->flash('error','Comment not found');
            return redirect()->back();
        }
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
        $comment=BlogComment::find($id);
        if($comment){
            $data=$request->all();
            // return $data;
            $status=$comment->fill($data)->update();
            if($status){
                request()->session()->flash('success','Comment successfully updated');
            }
            else{
                request()->session()->flash('error','Something went wrong! Please try again!!');
            }
            return redirect()->route('account.comment');
        }
        else{
            request()->session()->flash('error','Comment not found');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=BlogComment::find($id);
        if($comment){
            $status=$comment->delete();
            if($status){
                request()->session()->flash('success','Blog Comment successfully deleted');
            }
            else{
                request()->session()->flash('error','Error occurred please try again');
            }
            return back();
        }
        else{
            request()->session()->flash('error','Blog Comment not found');
            return redirect()->back();
        }
    }
}
