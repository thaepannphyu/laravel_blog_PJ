<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CKBoxExampleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// use function PHPUnit\Framework\fileExists;
// use App\Models\Blog;
// use App\Models\User;
// use App\Models\Category;

// use Illuminate\Support\Facades\DB;
// use Monolog\Logger;


Route::get('/', [BlogController::class, "index"]);

Route::get("/blogs/{blog:slug}", [BlogController::class, "show"])->where("blog", "[A-z\-\d_]+");

Route::get('/register', [AuthController::class, "create"])->middleware('guest');

Route::post('/register', [AuthController::class, "store"])->middleware('guest');

Route::post('/logout', [AuthController::class, "logout"])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);

Route::post("/blogs/{blog:slug}/subscribe", [BlogController::class, "subscribe"]);

//Admin

Route::middleware('can:admin')->group(function () {
    Route::get('/admins/blogs', [AdminBlogController::class, 'index']);
    Route::get('/admins/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admins/blogs/store', [AdminBlogController::class, 'store']);
    Route::delete('/admins/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destroy']);

    Route::get('/admins/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admins/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);
});
// Route::get("/blogs/{slug}", function ($id) {

//     return view("blog", [
//         "blog" => Blog::findOrFail($id)
//     ]);
// })->where("slug", "[A-z\-\d_]+");
// where("blog", "[A-z\-]+")
// // //view fun is in helper, only blade.php file 


//Route+Model binding -> wildcast and variable must be same name


// Route::get("/categories/{category:slug}",function(Category $category){
        
    
//         return view("blogs", [
//             "blogs" => $category->blogs->sortByDesc("created_at"),
//             "categories"=>Category::all(),
//             "currentCategory"=>$category->name
//         ]);

//         // ->load('category','author')
// });


// Route::get("/users/{user:slug}",function(User $user){
        
   
   
//     return view("blogs", [
//         "blogs" => $user->blogs->sortByDesc("created_at"),
//         // "categories"=>Category::all()
//     ]);
   


// });