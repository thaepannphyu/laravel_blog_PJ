 <!-- blogs section -->
@props(['blogs'])
 <section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
    <x-blog-dropdown/>
      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}
    </div>
    <form action="/#blogs" method="GET" class="my-3">
      <div class="input-group mb-3">
       @if (request("category"))
       <input
       type="hidden"
       name="category"
       value="{{request("category")}}"
       
     />
     @endif
       @if (request("author"))
       <input
       type="hidden"
       name="author"
       value="{{request("author")}}"
     />
           
       @endif
        <input
          type="text"
          name="search"
          value="{{request("search")}}"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
      <button type="submit" class=" btn btn-primary">
          Search
        </button>
      </div>
    </form>
    <div class="row">
      @forelse ($blogs as $blog)
     
      <div class=" col-md-4 mb-4">
        <x-blogcard :blog="$blog"/>
      </div>

      @empty
      <p class=" text-center">Blogs Not found</p>
    @endforelse
    {{$blogs->Links()}}
   
    </div>
  </section>