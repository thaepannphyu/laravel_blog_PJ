
<x-admin-layout>
   <x-card>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Intro</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $blog)
          <tr>
            <th >{{$blog->id}}</th>
           <td> <a href="/blogs/{{$blog->slug}}" class=" text-decoration-none" target="_blank"> {{$blog->title}}  </a></td>
            <td>{{$blog->intro}}</td>
            <td>
                <a href="/admins/blogs/{{$blog->slug}}/edit" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <form action="/admins/blogs/{{$blog->slug}}/delete" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
      {{$blogs->links()}}
   </x-card>
</x-admin-layout>