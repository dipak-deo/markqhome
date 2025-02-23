<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Auth;
use App\Models\Category;
use App\Models\PostMeta;
class PostController extends Controller
{
    public function index(Request $request)
    {
        if($request->category_id){
            // $post = Post::where('category_id', $request->category_id)->orderBy('id', 'DESC')->get();
            $postIds = PostMeta::where('meta_key', 'category_id')->where('meta_value', $request->category_id)->get();
            $post = Post::whereIn('id', $postIds->pluck('post_id'))->orderBy('id', 'DESC')->get();
            $post_title = Category::find($request->category_id)->name;
        }else{
            $post = Post::orderBy('id','DESC')->get();
            $post_title = 'All Post';
        }
        
        return view('admin.post.index', compact('post','post_title'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'category' => 'required',
        ]);
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            // dd($data);
            $data['slug'] = Str::slug($request->title);
            if($request->hasFile('image') && $request->file('image')->isValid() == true){
            $data['image'] = Post::uploadFile($data['image']);
            }
          $last_insert = Post::create($data);
            if($request->category){
                foreach($request->category as $category){
                    PostMeta::create([
                        'post_id' => $last_insert->id,
                        'meta_key' => 'category_id',
                        'meta_value' => $category,
                    ]);
                }
            }
            $meta_field = $request->only('font_awosome_icon','custom_redirect_url');
            foreach($meta_field as $key => $value){
                PostMeta::create([
                    'post_id' => $last_insert->id,
                    'meta_key' => $key,
                    'meta_value' => $value,
                ]);
            }
            return redirect()->route('post.index')->with('success_message', 'Post created successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }

       
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        return view('admin.post.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);
        try{
            $post = Post::findOrFail($id);
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            // $data['slug'] = Str::slug($request->title);
            if($request->hasFile('image') && $request->file('image')->isValid() == true){
                Post::deleteFile($post->image);
            $data['image'] = Post::uploadFile($data['image']);
            }
            $post->update($data);
            PostMeta::where('post_id', $id)->where('meta_key','category_id')->delete();
            if($request->category){
                foreach($request->category as $category){
                    PostMeta::create([
                        'post_id' => $id,
                        'meta_key' => 'category_id',
                        'meta_value' => $category,
                    ]);
                }
            }
            $meta_field = $request->only('font_awosome_icon','custom_redirect_url');
            foreach($meta_field as $key => $value){
                PostMeta::updateOrCreate([
                    'post_id' => $id,
                    'meta_key' => $key,
                ], [
                    'meta_value' => $value,
                ]);
            }
            return redirect()->route('post.index')->with('success_message', 'Post updated successfully.');
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function delete($id)
    {
       try{
            $post = Post::findOrFail($id);
            Post::deleteFile($post->image);
            PostMeta::where('post_id', $id)->delete();
            $post->delete();
            return redirect()->route('post.index')->with('success_message', 'Post deleted successfully.');
       }catch(\Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
       }
    
    }
}
