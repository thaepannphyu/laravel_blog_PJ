<x-layout>
 <div class="row justify-center">
    <div class="col-md-3 text-center  mt-4">
        <ul class="list-group col-md-10 m-lg-5 ">
            <li class="list-group-item"><a href="/admins/blogs" class=" text-decoration-none">Dashboard</a></li>
            <li class="list-group-item"><a href="/admins/blogs/create" class=" text-decoration-none">create form</a></li>
          </ul>
    </div>
    <div class="col-md-8">
        {{$slot}}
    </div>
 </div>


</x-layout>