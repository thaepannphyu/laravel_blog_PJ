{{-- 
 @extends('layout') 
  
@section('title')
<title>{{$blog->title }}</title>
    
@endsection

@section('content')
  <h1> {{$blog->title 
}}</h1>
<div>{!!$blog->body!!}</div>
<a href="/">Back</a>
@if (true)
<h1>Condition</h1>
@endif

  @endsection --}}

{{-- <x-layout>
    <x-slot name="title"><title> {{$blog->title 
    }}</title></x-slot>
    <h1> {{$blog->title 
    }}</h1>
    <div>{!!$blog->body!!}</div>
    <a href="/">Back</a>
    
</x-layout> --}}

<x-layout>

  <x-singleBlog :blog="$blog" />

  <x-commentForm :blogSlug="$blog->slug"/>

  @if ($blog->comment->count())
  <x-comment :comment="$blog->comment()->latest()->paginate(3)"/>
  @endif

  <x-blog-you-may-like-section :random="$randomBlogs"/>
</x-layout>
