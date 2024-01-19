 <!-- navbar -->
 <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
       {{-- @if (auth()->user()&& auth()->user()->can("admin")) --}}

       @can('admin')
       <a href="/admins/blogs" class="nav-link">Dashboard</a>
       @endcan
       
    
        <a href="/#blogs" class="nav-link">Blogs</a>
        
       @guest
       <a href="/register" class="nav-link">Register</a>  
       <a href="/login" class="nav-link">Login</a>
       @else
       <a href="" class="nav-link">{{auth()->user()->name}}</a>  
       <form action="/logout" method="POST">
        @csrf
        <button type="submit" href="" class="btn btn-link text-decoration-none">Log out</button>
      </form>
       @endguest

      {{-- @auth
     
      
      @endauth --}}
    
        <a href="#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
  </nav>