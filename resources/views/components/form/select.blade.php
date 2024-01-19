
@props(['name','categoryArrays','blogCategoryid'=>null])
{{-- @dd($blogCategoryid) --}}
<x-form.inputwrapper :name="$name">  
      <select class=" form-control" name={{$name."_id"}} id="{{$name}}">
        @foreach ($categoryArrays as $category)
        <option {{$category->id==old($name."_id",$blogCategoryid??$blogCategoryid)?'selected':''}} value={{$category->id}}>{{$category->name}}</option>
        @endforeach
     </select>
</x-form.inputwrapper>