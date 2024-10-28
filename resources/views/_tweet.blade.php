<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400'}}">
    <div class="mr-2">
        <a href="{{route('profile', $tweet->user->username)}}">
            <img src="{{$tweet->user->avatar}}" alt="" class="object-scale-down h-10 w-10 rounded-full mr-2">
        </a>
    </div>

    <div class="w-full">
        <div class="flex justify-between">
            <a href="{{route('profile', $tweet->user->username)}}">
                <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
            </a>

            <p class="text-sm text-gray-400">Created {{$tweet->created_at->diffForHumans()}}</p>
        </div>

        <p class="text-sm">{{$tweet->body}}</p>
    </div>
</div>