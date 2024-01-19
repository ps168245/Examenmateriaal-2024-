<x-app-layout>
    
    <div class="flex flex-col items-center gap-3">
        <span class="text-2xl font-semibold">{{ $author->name }}</span>
        <div class="flex flex-col gap-2 items-center">
            <span class="text-lg font-semibold">Books</span>
            <div class="flex flex-col">
                @foreach ($author->books as $book)
                    <a href="{{ route('books.show', ['book' => $book]) }}" class="font-semibold">{{ $book->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>