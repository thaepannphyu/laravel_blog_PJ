@props(['singleComment'])
<x-card>

    <div class="d-flex">
        <div>
            <img
                src={{$singleComment->author->avatar}}
                width="50"
                height="50"
                class="rounded-circle"
                alt=""
            >
        </div>
        <div class="ms-3">
            <h6>{{$singleComment->author->name}}</h6>
            <p class="text-secondary">{{$singleComment->created_at->format("F j, Y, g:i a")}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$singleComment->body}}
    </p>
</x-card>