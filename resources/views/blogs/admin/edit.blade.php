@props(['categories','blog'])
{{-- @dd($blog->category->id) --}}
<x-admin-layout>
     <x-card class="row  mx-auto"> 
        <h2 class=" text-center">Edit Blog</h2>
        <form enctype="multipart/form-data" action="/admins/blogs/{{$blog->slug}}/update"   method="POST" class=" row gap-4 justify-content-center">

            @csrf   {{-- cross site request forgery --}}
            @method("PATCH")
            <x-form.input name="title" value="{{$blog->title}}" :blog="$blog"/>
            <x-form.textarea name="body" value="{{$blog->body}}"/>
            <x-form.input name="slug" value="{{$blog->slug}}"/>
            <x-form.input name="intro" value="{{$blog->intro}}" />
            <x-form.input name="thumbnail" type="file"/>
            <div class=" row justify-content-lg-start">
                <img  src='{{asset("/storage/$blog->thumbnail")}}'  class=" align-self-end inline-block col-md-4 " alt="thumbnail image">
            </div>
            <x-form.select  name="category" blogCategoryid="{{$blog->category->id}}" :categoryArrays="$categories" />
            <x-form.submitBtn/>
          </form>
</x-card>
</x-admin-layout>

