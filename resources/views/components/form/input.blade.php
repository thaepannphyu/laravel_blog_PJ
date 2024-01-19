@props(['name','type'=>"text",'value'=>""])

<x-form.inputwrapper :name="$name">

    <input 
        name="{{$name}}" 
        value="{{old($name,$value)}}"
        type="{{$type}}" 
        class="form-control" 
        id="{{$name}}" 
        aria-describedby="{{$name}}.Help"
        placeholder="Enter  {{ucwords($name)}}">

</x-form.inputwrapper>