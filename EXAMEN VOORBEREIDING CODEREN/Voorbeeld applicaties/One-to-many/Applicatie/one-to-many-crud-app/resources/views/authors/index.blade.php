<x-app-layout>

    <div class="flex flex-col gap-2 p-10">
        <div class="flex flex-row justify-start">
            <a class="bg-background border border-black bg-[#64CCC5] text-[#04364A] font-semibold" href="{{ route('authors.create') }}">Author aanmaken</a>
        </div>


        <div class="flex flex-col p-3 gap-3 border border-black">
            @foreach ($authors as $author)
            <div class="flex flex-row bg-background border border-black bg-[#64CCC5]">
                <a href="{{ route('authors.show', ['author' => $author]) }}" class="grow flex flex-row p-3">
                    <span class="font-semibold text-[#04364A]">{{ $author->name }}</span>
                </a>
                <div class="justify-end flex flex-row p-3 gap-3 ">
                    <a href="{{ route('authors.edit', ['author' => $author]) }}" class="border px-5 bg-yellow-400 text-white border-black font-semibold">Edit</a>
                    <form action="{{ route('authors.destroy', ['author'=> $author]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="border px-3 bg-red-400 text-white border-black font-semibold hover:cursor-pointer">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <x-slot name="footer">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('footer') }}
        </h2>
    </x-slot>
</x-app-layout>