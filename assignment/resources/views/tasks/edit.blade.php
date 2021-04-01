<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tasks.update', [ 'task' => $task->id ]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                          <label for="name">Name</label>
                          <textarea name="name" class="form-control @error('name') is-invalid @enderror" id="name" rows="3">{{ old('name', $task->name) }}</textarea>
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="point">Points</label>
                            <input type="text" name="point" class="form-control @error('point') is-invalid @enderror" id="point" rows="3" value="{{ old('point', $task->point) }}"></input>
                            @error('point')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                        <div class="flex p-1">
                            <button type="submit" class="btn btn-primary">Edit Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>

