<div class="border border-blue-400 rounded-lg p-6 mb-6">
    <form method="POST" action="/tweets">
        @csrf
        <textarea 
            name="body" id="body" cols="30" rows="3"
            class="w-full" placeholder="What's up?"
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img src="{{$user->avatar}}" alt=""
                class="object-contain h-14 w-14 rounded-full">

            <button 
                type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-2 text-white"
                >Tweet what you want!</button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm">
            {{$message}}
        </p>
    @enderror
</div>