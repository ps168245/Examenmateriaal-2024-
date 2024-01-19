<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('artworks.update', ['artwork' => $artwork]) }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            @method('PUT')
            <label for="name" class="text-5xl font-semibold">Edit name</label>
            <input type="text" id="name" name="name" value="{{ $artwork->name }}" placeholder="Insert a name..." required class="text-center">
            <label for="art_picture" class="text-5xl font-semibold">Edit art picture</label>
            <input type="text" id="art_picture" name="art_picture" value="{{ $artwork->art_picture }}" placeholder="Insert an image URL..." required class="text-center">

            <!-- Multi-select dropdown for artists to select different artists -->
            <label for="artists" class="text-5xl font-semibold">Edit Artists</label>
            <select name="artists[]" id="artists" multiple>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ in_array($artist->id, $artwork->artists->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $artist->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-500">Hold down the Ctrl key (Windows/Linux) or Command key (Mac) to select multiple artists or to unselect them.</small>

            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>
