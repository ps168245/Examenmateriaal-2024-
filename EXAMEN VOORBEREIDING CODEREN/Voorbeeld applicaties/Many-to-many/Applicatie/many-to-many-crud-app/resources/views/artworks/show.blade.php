<x-app-layout>
<div class="flex flex-col items-center gap-6 py-8">
        <span class="text-2xl font-semibold">{{ $artwork->name }}</span>
        <img src="{{ $artwork->art_picture }}" alt="Art Picture" class="w-32 h-32 rounded-full">

        <div class="flex flex-col gap-4 items-center mt-4">
            <span class="text-lg font-semibold">Artists who created this art:</span>
            <div class="flex flex-col">
                @foreach ($artwork->artists as $artist)
                    <div class="flex items-center gap-4">
                        <img src="{{ $artist->profile_picture }}" alt="profile_picture" class="w-16 h-16 rounded">
                        <a href="{{ route('artists.show', ['artist' => $artist]) }}" class="font-semibold">{{ $artist->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
