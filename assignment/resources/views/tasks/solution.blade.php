<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-blue-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Task Description</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solution->description}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-top: 50px;  margin-left: 20px"><h1>Solution</h1></div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2>{{$solution->answer}}</h2>
                    <form action="{{ route('evaluate_solution', [ 'id' => $solution->id ]) }}" method="post">
                        @csrf
                        @method('POST')

                          <div class="form-group">
                            <label for="point">Given Points</label>
                            <input type="text" name="point" class="form-control @error('point') is-invalid @enderror" id="point" rows="3" value="{{ old('point', '0') }}"></input>
                            @error('point')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                        <div class="flex p-1">
                            <button type="submit" class="btn btn-primary">Evaluate Solution</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>

