<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =["thumbnail","user_id",'title','intro','body','slug',"category_id"];
    protected $with=['author','category'];



    public function scopeFilter($query,$filter){
 
        $query->when($filter["search"]??false,function($query,$search){
            $query->
                where(
                function($query) use($search){
                   
                $query->
                where("title","LIKE","%".$search."%")
                ->orWhere("body","LIKE","%".$search."%");})

                // ->where("title","frontend")
                ;
            });


            $query->when($filter["category"]??false,function($query,$slug){
           
                $query->whereHas("category",function($query) use($slug){
                    // dd($query);
                    $query->where("slug",$slug);//Category{id,name,slug}
                
                });
            });

            $query->when($filter["author"]??false,function($query,$author){
                $query->whereHas("author",function($query) use($author){
                   $query->where("username",$author);
                });
            });
            
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class,'blog_user');
    }

    public function unSubscribe() {
        $this->subscribers()->detach([auth()->id()]);
    }

    public function subscribe() {
        $this->subscribers()->attach( auth()->id());
    }

    
}
