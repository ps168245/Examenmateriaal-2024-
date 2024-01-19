<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('artists.update', ['artist' => $artist]) }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            @method('PUT')
            <label for="name" class="text-5xl font-semibold">Edit name</label>
            <input type="text" id="name" name="name" value="{{ $artist->name }}" placeholder="Insert a name..." required class="text-center">
            <label for="profile_picture" class="text-5xl font-semibold">Edit profile picture</label>
            <input type="text" id="profile_picture" name="profile_picture" value="{{ $artist->profile_picture }}" placeholder="Insert an image URL..." required class="text-center">

            <!-- Multi-select dropdown for artworks to select different artworks -->
            <label for="artworks" class="text-5xl font-semibold">Edit Artworks</label>
            <select name="artworks[]" id="artworks" multiple>
                @foreach($artworks as $artwork)
                    <option value="{{ $artwork->id }}" {{ in_array($artwork->id, $artist->artworks->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $artwork->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-500">Hold down the Ctrl key (Windows/Linux) or Command key (Mac) to select multiple artworks or to unselect them.</small>

            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>
