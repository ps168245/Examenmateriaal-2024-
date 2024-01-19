<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('books.update', ['book' => $book]) }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            @method('PUT')
            <label for="title" class="text-5xl font-semibold">Title</label>
            <input type="text" id="title" name="title" value="{{ $book->title }}" placeholder="Insert a name..." required class="text-center">
            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>