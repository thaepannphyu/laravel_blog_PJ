@props(['comment'])

<x-comment-container>
        <h5 class="my-3 text-secondary">Comments ({{$comment->count()}})</h5>
        @foreach ($comment as $singleComment)
        <x-single-comment :singleComment="$singleComment"/>
        @endforeach
        {{$comment->links()}}
</x-comment-container>