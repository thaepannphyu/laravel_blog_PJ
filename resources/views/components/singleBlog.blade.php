@props(['blog'])
{{-- @dd($blog->category->slug) --}}
<!-- singloe blog section -->
 <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
       <img src="/storage/{{$blog->thumbnail}}" class="object-fit-cover col-md-4"  alt="">
        <h3 class="my-3">{{$blog->title}}</h3>
        <div>
          <div> Author- <a href="/users/{{$blog->author->slug}}">{{$blog->author->name}}</a></div>
          <div> {{$blog->created_at->diffForHumans()}}</div>
         
      <form action="/blogs/{{$blog->slug}}/subscribe" method="POST">
        @csrf
      @auth
      @if (auth()->user()->isSubscribed($blog))
      <button class=" btn btn-danger"> unsubscribe</button>
      @else
      <button  class=" btn btn-warning">subscribe</button>
      @endif
      @endauth
      
      
      </form>
         
        </div>
        <a href="?category={{$blog->category->slug}}{{request('search')?'&search='.request('search'):""}}{{request("author")?"&author=".request('author'):""}}"><div class=" badge bg-dark"> {{$blog->category->name}}</div></a>
        <p class="lh-md">
         {!!$blog->body!!}
        </p>
      </div>
    </div>
  </div>