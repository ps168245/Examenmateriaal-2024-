<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('artists.store') }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            <label for="name" class="text-5xl font-semibold">Name</label>
            <input type="text" id="name" name="name" placeholder="Insert a name..." required class="text-center">
            <label for="profile_picture" class="text-5xl font-semibold">Profile picture</label>
            <input type="text" id="profile_picture" name="profile_picture" placeholder="Insert an image URL..." required class="text-center">
            
            <!-- Optionally add artwork if the user wants to assign an artwork to an artist. -->
            <label for="artwork" class="text-5xl font-semibold">Select Artworks (optional)</label>
            <select name="artwork[]" id="artwork" multiple>
                @foreach($artworks as $artwork)
                    <option value="{{ $artwork->id }}">{{ $artwork->name }}</option>
                @endforeach
            </select>
            <small class="text-gray-500">Hold down the Ctrl key (Windows/Linux) or Command key (Mac) to select multiple artworks or to unselect them.</small>

            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>
