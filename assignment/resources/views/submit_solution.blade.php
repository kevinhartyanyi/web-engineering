<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Solution') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-blue-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Subject Name</th>
                                <th class="py-3 px-6 text-left">Teacher</th>
                                <th class="py-3 px-6 text-left">Task Description</th>
                                <th class="py-3 px-6 text-left">Point</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$task->subject}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$task->teacher}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$task->description}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$task->point}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h1 style="margin-top: 50px; margin-bottom: 20px">Type your solution here</h1>
                    <form action="{{ route('save_solution', [ 'id' => $task->id ]) }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="solution">Solution</label>
                          <textarea name="solution" class="form-control @error('solution') is-invalid @enderror" id="solution" rows="3">{{ old('solution', '') }}</textarea>
                          @error('solution')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit Solution</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

