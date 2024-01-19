<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{


    public function index()
    {
        $this->authorize('admin');
        return view('blogs.admin.index', [
            'blogs' => Blog::latest()->paginate(7)
        ]);
    }

    public function create()
    {

        return view('blogs.admin.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $path = request()->file('thumbnail')->store('public.thumbnails');
        $formData = request()->validate([
            "title" => ['required'],
            "body" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "category_id" => ['required', Rule::exists('blogs', 'category_id')],
        ]);
        $formData['user_id'] = auth()->user()->id;
        $formData['thumbnail'] = $path;

        Blog::create($formData);

        return redirect('/');
    }

    public function edit(Blog $blog)
    {

        return view('blogs.admin.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Blog $blog)
    {
        $path = request()->file('thumbnail') ? request()->file('thumbnail')->store('public.thumbnails') : $blog->thumbnail;
        $formData = request()->validate([
            "title" => ['required'],
            "body" => ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "category_id" => ['required', Rule::exists('blogs', 'category_id')],
        ]);
        $formData['user_id'] = auth()->user()->id;
        $formData['thumbnail'] = $path;

        $blog->update($formData);
        return redirect('/');
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}