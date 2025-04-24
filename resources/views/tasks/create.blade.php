@extends("layouts.app")

@section("content")
    <h1 class="text-2xl font-bold mb-4">Create Task</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route("tasks.store") }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old("title") }}" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error("title") border-red-500 @enderror">
                @error("title")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y @error("description") border-red-500 @enderror" rows="3" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ old("description") }}</textarea>
                @error("description")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Task</button>
        </form>
    </div>
@endsection