<x-app-layout>
    <div class="flex flex-col items-center gap-6 py-8">
        <span class="text-2xl font-semibold">{{ $artist->name }}</span>
        <img src="{{ $artist->profile_picture }}" alt="Profile Picture" class="w-32 h-32 rounded-full">

        <div class="flex flex-col gap-4 items-center mt-4">
            <span class="text-lg font-semibold">Artworks</span>
            <div class="flex flex-col">
                @foreach ($artist->artworks as $artwork)
                    <div class="flex items-center gap-4">
                        <img src="{{ $artwork->art_picture }}" alt="art_picture" class="w-16 h-16 rounded">
                        <a href="{{ route('artworks.show', ['artwork' => $artwork]) }}" class="font-semibold">{{ $artwork->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
