<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('artworks.store') }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            <label for="name" class="text-5xl font-semibold">Name</label>
            <input type="text" id="name" name="name" placeholder="Insert a name..." required class="text-center">
            <label for="art_picture" class="text-5xl font-semibold">art picture</label>
            <input type="text" id="art_picture" name="art_picture" placeholder="Insert an image URL..." required class="text-center">
            
            <!-- Optionally add artwork if the user wants to assign an artwork to an artwork. -->
            <label for="artist" class="text-5xl font-semibold">Select artists (optional)</label>
            <select name="artist[]" id="artist" multiple>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>
            <small class="text-gray-500">Hold down the Ctrl key (Windows/Linux) or Command key (Mac) to select multiple artists or to unselect them.</small>

            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>
