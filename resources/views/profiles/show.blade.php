@extends('components.app')


@section('content')
    <header class="mb-6 rounded-lg" style="position: relative">

        <div class="relative">
            <img src="/images/header1.png" alt="" class="mb-2 rounded-lg">

            <img src="{{$user->avatar}}" alt=""
            class="object-contain rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
            width="150"
            height="150"
            style="left: 50%">
        </div>
        

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class='font-bold text-2xl mb-0'>{{$user->name}}</h2>
                <p class="text-sm text-gray-400">{{$user->username}}</p>
            </div>

            <div class="flex">

                @auth
                    @can('edit', $user)
                        <form method="GET" action="/profile/{{$user->username}}/edit">
                            @csrf   
                            <button 
                                type="submit" class="rounded-full border border-gray-200 py-2 px-2 text-xs"
                                >Edit Profile
                            </button>
                        </form>
                    @else
                        <form method="POST" action="/profile/{{$user->username}}/follow">
                            @csrf   
                            <button 
                                type="submit" class="{{ auth()->user()->following($user) ? 'border border-gray-200' : 'bg-blue-500 text-white shadow' }} rounded-full py-2 px-2 mx-2 text-xs"
                                >{{ auth()->user()->following($user) ? 'Unfollow' : 'Follow'}}
                            </button>
                        </form>
                    @endcan
                @endauth
            
            </div>
        </div>

        <p class="text-sm mt-4">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a 
            type specimen book.
        </p>
    </header>


    <div class="border border-gray-300 rounded-lg">
        @forelse ($user->tweets as $tweet)
            @include('_tweet') 
        @empty
            <p class="p-4">No tweets yet...</p>
        @endforelse
    </div>
@endsection