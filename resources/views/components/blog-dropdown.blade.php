
<div class="dropdown">

    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    {{isset($currentCategory)?$currentCategory->slug:"Filtered by category"       
   }}
  
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li style="{{isset($currentCategory)?'':"display:none"}}"><a class="dropdown-item" href="/{{request('search')?'?search='.request('search'):""}}#blogs"> all</a></li>

      @foreach ($categories as $category)
       <li><a class="dropdown-item" href="?category={{$category->slug}}{{request('search')?'&search='.request('search'):""}}{{request("author")?"&author=".request('author'):""}}">{{$category->name}}</a></li>
      @endforeach
   
     </ul>
  </div>
