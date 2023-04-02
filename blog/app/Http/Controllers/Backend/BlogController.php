<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Image;

class BlogController extends Controller
{
    public function BlogAll()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blog.blog_all',compact('blogs'));
    }

    public function BlogAdd()
    {
        $categories = Category::latest()->get();
        return view('backend.blog.blog_add',compact('categories'));
    }

    public function BlogStore(Request $request)
    {
        $image = $request->file('blog_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(440,220)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'category_id' => $request->category_id,
            'blog_title' => $request->blog_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'blog_thumbnail' => $save_url
        ]);

        $notification = array(
            'message' => 'Blog inserted succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.all')->with($notification); 
    }

    public function BlogEdit($id)
    {
        $categories = Category::latest()->get();
        $blogs = Blog::findOrFail($id);

        return view('backend.blog.blog_edit',compact('categories','blogs'));
    }

    public function BlogUpdate(Request $request)
    {
        $blog_id = $request->id;
        $old_image = $request->old_image;

            if ($request->file('blog_thumbnail')) {

                $image = $request->file('blog_thumbnail');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(440,220)->save('upload/blog/'.$name_gen);
                $save_url = 'upload/blog/'.$name_gen;
        
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

            Blog::findOrFail($blog_id)->update([
                'category_id' => $request->category_id,
                'blog_title' => $request->blog_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'blog_thumbnail' => $save_url
            ]);

            $notification = array(
                'message' => 'Blog updated with image succesfully',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.all')->with($notification); 

        } else {

             Blog::findOrFail($blog_id)->update([
                'category_id' => $request->category_id,
                'blog_title' => $request->blog_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'Blog updated without image succesfully',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.all')->with($notification); 
        }
    }

    public function BlogDelete($id)
    {
        $blogs = Blog::findOrFail($id);

        $image = $blogs->blog_thumbnail;
        unlink($image);

        $blogs->delete();

        $notification = array(
            'message' => 'Blog deleted succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}