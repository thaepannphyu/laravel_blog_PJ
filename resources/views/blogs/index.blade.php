{{-- @extends('layout')


@section('title')
<title>Blogs</title>
    
@endsection
@section('style')
    <style>
      .bg-grey{
        background-color: gray
      }
    </style>
@endsection

  @section('content')
  @foreach ($blogs as $blog) 
    
  <div class="{{$loop->even?"bg-grey":""}}">
   <a href={{$blog->slug}}>{{$blog->title}}</a>
   <div>Published at {{$blog->date}}</div>
   <div>{{$blog->intro}}</div>
  </div>
  
@endforeach
  @endsection --}}
{{-- 
<x-layout content="hi">
<x-slot name="content"> @foreach ($blogs as $blog) 
    
  <div class="{{$loop->even?"bg-grey":""}}">
   <a href={{$blog->slug}}>{{$blog->title}}</a>
   <div>Published at {{$blog->date}}</div>
   <div>{{$blog->intro}}</div>
  </div>
  
@endforeach</x-slot>
</x-layout> --}}


{{-- <x-layout content="hi">
  <x-slot name="title">
    <title>Blogs</title>
  </x-slot>
  @foreach ($blogs as $blog) 
    
  <div class="{{$loop->even?"bg-grey":""}}">
  <h1>   <a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
   <p><a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
   <a href="/users/{{$blog->author->slug}}"><h3>Author- {{$blog->author->name}}</h3></a>
   <div>Published at {{$blog->created_at->diffForHumans()}}</div>
   <div>{{$blog->intro}}</div>
  </div>
  s
  @endforeach
</x-layout> --}}
{{-- @dd($blogs) --}}
{{-- @dd($categories[0]->name) --}}
{{-- @dd($currentCategory) --}}
<x-layout>
  @if (session("success"))
  <div class="alert alert-success text-center">{{session("success")}}</div>
  @endif
  <x-herosection/>
  <x-blogsection :blogs="$blogs"  />
  {{-- <x-subscribe/> --}}
 </x-layout>