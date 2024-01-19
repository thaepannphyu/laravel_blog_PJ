<x-layout>
    <div class="container">
     <div class="row justify-content-center my-5">
         <div class="col-md-5">
             <div class="card shadow-sm p-3">
                 <form  method="POST" class=" row gap-4 justify-content-center">
                     @csrf   {{-- cross site request forgery --}}
                     <x-form.input name="email" type="email"/>
                     <x-form.input name="password" type="password"/>
                     <x-form.submitBtn />
                  </form>
             </div>
         </div>
     </div>
    </div>
 </x-layout>