

@props(['name'])
<div class="form-group">
    <label for="{{$name}}">{{ucwords($name)}}</label>
    {{$slot}}
    <x-error name='{{$name}}'/>
 </div>