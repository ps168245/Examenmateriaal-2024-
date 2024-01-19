<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('books.store') }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            <label for="title" class="text-5xl font-semibold">Title</label>
            <input type="text" id="title" name="title" placeholder="Insert a name..." required class="text-center">
            <label for="author_id" class="text-5xl font-semibold">Author</label>
            <select id="author_id" name="author_id">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>