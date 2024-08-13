<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
public function Post(){
    $posts=Post::all();
    return view('admin.post',compact('posts'));
}
public function All()
{
    header('Access-Control-Allow-Origin: *');
    $posts = Post::all();
    return response()->json($posts);
}
public function Show($post_id){
    header('Access-Control-Allow-Origin: *');
    $posts=Post::find($post_id);
    return response()->json($posts);
   
}
public function Create(){
    return view('admin.createpost');
}
public function Store(PostFormRequest $request){
   
   $data = $request -> validated();
   
    $post = new Post;
    $post->name = $data['name'];
    $post->slug = $data['slug'];
    $post->description = $data['description'];
    $post->yt_iframe = $data['yt_iframe'] ?? '';
    $post->meta_title = $data['meta_title'];
    $post->meta_description = $data['meta_description'];
    $post->meta_keyword = $data['meta_keyword'];
    $post->status = $request->status==true? '1':'0';
   // $post->created_by = Auth::user()->id;
    
    $post->save();

    return redirect()->route('admin.post')->with('message', 'Post added successfully');
}
    public function Edit($post_id){
        $posts=Post::find($post_id);
        return view('Admin.edit',compact('posts'));
    }

    public function Update(PostFormRequest $request, $post_id){
        $data = $request -> validated();
   
    $post = Post::find($post_id);
    $post->name = $data['name'];
    $post->slug = $data['slug'];
    $post->description = $data['description'];
    $post->yt_iframe = $data['yt_iframe'] ?? '';
    $post->meta_title = $data['meta_title'];
    $post->meta_description = $data['meta_description'];
    $post->meta_keyword = $data['meta_keyword'];
    $post->status = $request->status==true? '1':'0';
   // $post->created_by = Auth::user()->id;
    
    $post->update();

    return redirect()->route('admin.post')->with('message', 'Post updated successfully');
    }
    public function Destroy($post_id){
        $posts=Post::find($post_id);
        $posts->delete();
        return redirect()->route('admin.post')->with('message', 'Post Deleted successfully');
    }

}