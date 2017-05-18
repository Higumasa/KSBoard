<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use Mail;
use DB;

class PostsController extends Controller
{

  public function index() {
    //$posts = \App\Post::all();
    //$posts = Post::all();
    //$posts = Post::orderBy('created_at', 'desc')->get();
    //$posts = [];
    $posts = Post::latest('created_at')->get();
    //dd($posts->toArray()); //dump die

    //return view('posts.index',['posts' => $posts]);
    return view('posts.index') ->with('posts',$posts);
  }

  public function show($id) {
    $post = Post::findOrFail($id);
    $user = \Auth::user();
    $name = '@' . $user->name;
    return view('posts.show') ->with(['post' => $post , 'name' => $name]);
  }

  public function edit($id) {
    $post = Post::findOrFail($id);
    return view('posts.edit') ->with('post',$post);
  }

  public function destroy($id) {
    $post = Post::findOrFail($id);
    $post->delete();
    \Session::flash('flash_message', 'Post Deleted!');
    return redirect('/posts');
  }

  public function create() {
    return view('posts.create');
  }

  public function store(PostRequest $request) {

//新規投稿
    $post = new Post();
    $post->title = $request->title;
    $post->body = $request->body;
    $inform = $request->title;
    $post->save();
    \Session::flash('flash_message', 'Post Added!');

    //新規投稿を局員にメールで通知する。
    $from = 'higumasa1102@gmail.com';
    $data['users']=DB::table('users')->lists('email');

    foreach($data as $row){
      $email = $row;
    }

    foreach($email as $row){

      Mail::send('emails.html', array('email' => $row), function($message) use($row,$from,$inform){
        $message->from($from, 'KSBoard');
        $message->to($row)->subject($inform);
      });

    }

    return redirect('/posts');

  }

  public function update(PostRequest $request, $id) {
    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();
    \Session::flash('flash_message', 'Post Updated!');

    $agree = $request->agree;

    if($agree == '1'){

      $inform = $request->title;

      //編集したことを局員にメールで通知する。
      $from = 'higumasa1102@gmail.com';
      $data['users']=DB::table('users')->lists('email');

      foreach($data as $row){
        $email = $row;
      }

      foreach($email as $row){

        Mail::send('emails.update', array('email' => $row), function($message) use($row,$from,$inform){
          $message->from($from, 'KSBoard【記事更新情報】');
          $message->to($row)->subject('「' . $inform . '」' . ' の記事が更新されました');
        });

      }

    }

    return redirect('/posts');
  }

}
