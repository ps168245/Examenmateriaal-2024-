<x-app-layout>
    <div class="my-3 mx-4">
        <a href="{{ route('artists.create') }}" class="border px-5 bg-green-400 text-white border-black font-semibold">Create Artist</a>
    </div>

    <div class="flex flex-col p-3 gap-3 border border-black mx-4"> 
        @foreach ($artists as $artist)
            <div class="flex flex-row bg-background border border-black bg-[#64CCC5]">
                <a href="{{ route('artists.show', ['artist' => $artist]) }}" class="grow flex flex-row p-3">
                    <span class="font-semibold">{{ $artist->name }}</span>
                </a>
                <div class="justify-end flex flex-row p-3 gap-3">
                    <a href="{{ route('artists.edit', ['artist' => $artist]) }}" class="border px-5 bg-yellow-400 text-white border-black font-semibold">Edit</a>
                    <form action="{{ route('artists.destroy', ['artist'=> $artist]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="border px-3 bg-red-400 text-white border-black font-semibold">
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('footer') }}
        </h2>
    </x-slot>
</x-app-layout>
