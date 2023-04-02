<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class IndexController extends Controller
{
    public function BlogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blog.blog_details',compact('blog'));
    }
}

