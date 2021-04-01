<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Subject') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('subjects.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <textarea name="name" class="form-control @error('name') is-invalid @enderror" id="name" rows="3">{{ old('name', '') }}</textarea>
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', '') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="subject_code">Code</label>
                            <input type="text" name="subject_code" class="form-control @error('subject_code') is-invalid @enderror" id="subject_code" rows="3" value="{{ old('subject_code', '') }}"></input>
                            @error('subject_code')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" name="credit" class="form-control @error('credit') is-invalid @enderror" id="credit" rows="3" value="{{ old('credit', '') }}"></input>
                            @error('credit')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                        <div class="flex p-1">
                            <button type="submit" class="btn btn-primary">Create Subject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>

