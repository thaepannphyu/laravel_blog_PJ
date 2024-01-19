@props(['name','value'=>""])
<x-form.inputwrapper :name="$name">
    <textarea 
     id="{{$name}}" 
     class="form-control editor"
     placeholder="create your own blog" 
     name="{{$name}}" 
     rows="4" 
     cols="10">{!!old($name,$value)!!}</textarea>
</x-form.inputwrapper>

