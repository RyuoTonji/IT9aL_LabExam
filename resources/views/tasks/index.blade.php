@extends("layouts.app")

@section("content")
    <h1 class="text-2xl font-bold mb-4">Tasks</h1>
    @if ($tasks->isEmpty())
        <p class="text-gray-600">No tasks available.</p>
    @else
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left text-gray-700 font-semibold">Title</th>
                        <th class="p-3 text-left text-gray-700 font-semibold">Description</th>
                        <th class="p-3 text-left text-gray-700 font-semibold">Status</th>
                        <th class="p-3 text-left text-gray-700 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="{{ $task->is_completed ? "bg-green-100" : "bg-yellow-100" }}">
                            <td class="p-3 border-t">{{ $task->title }}</td>
                            <td class="p-3 border-t whitespace-normal min-w-[300px]">{{ $task->description ?? "N/A" }}</td>
                            <td class="p-3 border-t">
                                {{ $task->is_completed ? "Completed" : "Pending" }}
                            </td>
                            <td class="p-3 border-t flex space-x-2">
                                <a href="{{ route("tasks.edit", $task) }}" class="text-blue-600 hover:text-blue-800 text-lg">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route("tasks.destroy", $task) }}" method="POST" class="inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-lg" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection