<x-app-layout>
    <div class="flex flex-row justify-center">
        <form action="{{ route('authors.update', ['author' => $author]) }}" method="POST" class="flex flex-col items-center gap-3">
            @csrf
            @method('PUT')
            <label for="name" class="text-5xl font-semibold">Name</label>
            <input type="text" id="name" name="name" value="{{ $author->name }}" placeholder="Insert a name..." required class="text-center">
            <input type="submit" value="Submit">
        </form>
    </div>
</x-app-layout>