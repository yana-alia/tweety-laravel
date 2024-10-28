@extends('components.app')


@section('content')
    <form action="/profile/{{$user->username}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Username') }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

                @error('username')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Name') }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="username" autofocus>

                @error('name')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('E-mail') }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                @error('email')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Avatar') }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" autocomplete="avatar" autofocus>

                @error('avatar')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __("New Password") }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="password" type="password" class="form-control @error("password") is-invalid @enderror" name="password" autocomplete="password" autofocus>

                @error("password")
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Confirm Password') }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation" autofocus>

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="currPassword" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Current Password') }}</label>

            <div class="mb-2">
                <input class="border border-gray-400 p-2 w-full"
                    id="currPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="currPassword" required autocomplete="currPassword" autofocus>

                @error('currPassword')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary rounded uppercase bg-blue-500 text-white px-4 py-2">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection