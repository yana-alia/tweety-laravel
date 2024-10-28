<x-master>
    <section class="px-8 py-4">
        <main class="container mx-auto">
            <div class="flex justify-between">

                @auth
                    <div class="lg:w-1/6">
                        @include('_sidebar-links')
                    </div>
                @endauth

                <div class="flex-1 lg:mx-10" style="max-width: 800px">
                    @yield('content')
                </div>

                @auth
                    <div class="lg:w-1/6">
                        @include('_friends-list')
                    </div>
                @else
                    <div>
                        <div class="mx-auto px-6 py-4 bg-blue-200 rounded-lg">
                            <h3 class="font-bold text-xl m-4 text-center">Join Tweety!</h3>

                            <div class="flex justify-between mx-auto w-60 mb-4">
                                <a 
                                    class="font-bold bg-blue-500 hover:bg-blue-700 text-white shadow rounded-lg p-4 mx-2 text-md" 
                                    href="{{ route('login') }}">Login</a>
                                <a 
                                    class="font-bold bg-blue-500 hover:bg-blue-700 text-white shadow rounded-lg p-4 mx-2 text-md" 
                                    href="{{ route('register') }}">Register</a>
                            </div>
                        </div> 
                    </div>
                @endauth
            </div>
        </main>
    </section>
</x-master>
