<div class="bg-blue-100 rounded-lg p-4">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @foreach (auth()->user()->follows as $follower)   
            <li>    
                <a href="{{route('profile', $follower->username)}}" class="flex items-center text-sm mb-2">
                    <img src="{{$follower->avatar}}" alt="" class="object-scale-down h-10 w-10 rounded-full mr-2">
                    {{$follower->name}}
                </a>
            </li>
        @endforeach
    </ul>    
</div>
