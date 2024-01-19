<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        //   how to write gate and use 
        //auth()->user()->can("ability")
        // middleware("can:ability")
        // $this->authorize('admin');

        return view("blogs.index", [
            "blogs" => Blog::latest()->filter(request(["search", "category", "author"]))->paginate(6)->withQueryString(), //lazy load,

        ]);
    }


    public function show(Blog $blog)
    {

        return view("blogs.show", [
            "blog" => $blog->load('category', 'author'),
            "randomBlogs" => Blog::inRandomOrder()->take(3)->get()

        ]);
    }

    public function subscribe(Blog $blog)
    {

        if (User::find(auth()->id())->isSubscribed($blog)) {
            $blog->unSubscribe();
            return redirect("blogs/$blog->slug");
        } else {
            $blog->subscribe();
            return redirect("blogs/$blog->slug");
        }
    }


    // protected function getBlogs(){

    //    return  Blog::latest()->filter(request(["search"]))->get();
    //     // $query=Blog::latest();

    //     // if(request("search")){
    //     //     $blogs=$blogs->where("title","LIKE","%".request("search")."%")
    //     //     ->orWhere("body","LIKE","%".request("search")."%");
    //     // }

    //     // $query->when(request("search"),function($query,$search){
    //     //     $query->where("title","LIKE","%".$search."%")
    //     //     ->orWhere("body","LIKE","%".$search."%");
    //     // });

    //     // return $query->get();
    // }


}