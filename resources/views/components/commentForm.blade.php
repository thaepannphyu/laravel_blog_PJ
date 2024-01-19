@props(['blogSlug'])
<x-comment-container>
    @auth
    <x-card class="  ">

       
        <form action="/blogs/{{$blogSlug}}/comment" method="POST" >
            @csrf
            <div class="form-group">
              <textarea name="comment" class="form-control border-0" id="exampleFormControlTextarea1" placeholder="say something" rows="5" cols="10"></textarea>
            </div>
           <x-error name='comment'/>
        <div class=" d-flex justify-content-end mt-5">
            <button class=" btn btn-secondary " type="submit">Comment</button>
        </div>
          </form>
        
        
    </x-card>
    @else

    <a href="/login" class=" d-flex justify-content-center"><p>Login to write comment</p></a>

    @endauth
       
</x-comment-container>

    
