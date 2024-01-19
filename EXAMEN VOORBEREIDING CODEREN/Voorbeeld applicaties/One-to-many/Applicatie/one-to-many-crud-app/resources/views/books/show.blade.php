<x-app-layout>
    <div class="flex flex-col items-center gap-3">
        <span class="text-2xl font-semibold">{{ $book->title }}</span>
        <div class="flex flex-col gap-2 items-center">
            <span class="text-lg font-semibold">Author</span>
            <div class="flex flex-col">
                <!-- Because we only have one author, we don't need to use a foreach loop. -->
                <a href="{{ route('authors.show', ['author' => $book->author]) }}" class="font-semibold">{{ $book->author->name }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
