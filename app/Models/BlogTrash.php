<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public  $body;
    public $date;


    public function __construct($title, $slug, $intro, $body,$date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
        $this->date=$date;
    }

    public static function all()
    {
        $files = File::files(resource_path("blogs")); //get all file from that path
        // dd(); //dump and die
        // return array_map(function ($file) { //look like map method in js
        //     return $file->getContents(); //only use content
        // }, $files);
    // return array_map(function($file){
    //     $obj = YamlFrontMatter::parseFile($file);
    //     return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
    //    },$files);
      
   return collect($files)->map(function($file){
        $obj = YamlFrontMatter::parseFile($file);
        
      return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body(),$obj->date);
    })->sortByDesc("date");

    }


    public static function find($slug)
    {
        $allblogs=static::all();
        // dd($allblogs->first()->slug);
      return $allblogs->firstWhere("slug","/blogs/".$slug);
        // $path = __DIR__ . "/../resources/blogs/$slug.html";


        // $path = resource_path("blogs/$slug.html");
        // if (!file_exists($path)) {
        //     redirect('/');
        //     return;
        // }

        // return cache()->remember("posts.$slug", now()->addMinute(1), function () use ($path) {

        //     return file_get_contents($path);
        // });

       
    }
    public static function findOrFail($slug)
    {
       $blog=static::find($slug);
       if(!$blog){
        // abort(404); parameter= code no
        throw new ModelNotFoundException();
       };
       return $blog;
       
       
    }
}
