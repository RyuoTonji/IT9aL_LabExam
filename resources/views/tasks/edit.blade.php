@extends("layouts.app")

@section("content")
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route("tasks.update", $task->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old("title", $task->title) }}" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error("title") border-red-500 @enderror">
                @error("title")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y @error("description") border-red-500 @enderror" rows="3" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ old("description", $task->description) }}</textarea>
                @error("description")
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="is_completed" class="flex items-center text-gray-700 font-semibold">
                    <input type="checkbox" name="is_completed" id="is_completed" value="1" {{ $task->is_completed ? "checked" : "" }} class="mr-2">
                    Completed
                </label>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Task</button>
        </form>
    </div>
@endsection