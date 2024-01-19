@props(['categories'])
<x-admin-layout>
     <x-card class="row  mx-auto"> 
        <h2 class=" text-center">Create Blog</h2>
        <form enctype="multipart/form-data" action="/admins/blogs/store"  method="POST" class=" row gap-4 justify-content-center">
            @csrf   {{-- cross site request forgery --}}
            <x-form.input name="title"/>
            <x-form.textarea name="body"/>
            <x-form.input name="slug"/>
            <x-form.input name="intro"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.select name="category" :categoryArrays="$categories"  />
            <x-form.submitBtn/>
          </form>
</x-card>
</x-admin-layout>