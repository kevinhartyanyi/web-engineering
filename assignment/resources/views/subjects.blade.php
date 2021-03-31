<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Subjects') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                @if (!Auth::user()->teacher)
                    <div class="inline-block mr-2 mt-2">
                        <a href="/take" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">Take a new Subject</a>
                    </div>
                @endif
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                @if (!Auth::user()->teacher)
                                    <th class="py-3 px-6 text-left">Teacher</th>
                                @endif
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-center">Code</th>
                                <th class="py-3 px-6 text-center">Credit</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($user_subjects as $subject)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                @if (!Auth::user()->teacher)
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$subject->teacher}}</span>
                                    </div>
                                </td>
                                @endif
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if (Auth::user()->teacher)
                                            <span class="font-medium">{{$subject->name}}</span>
                                        @else
                                            <a href={{ route('subject_details', [ 'id' => $subject->id ]) }} class="font-medium">{{$subject->name}}</a>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->description}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{$subject->subject_code}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$subject->credit}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form action="{{ route('subjects.destroy', [ 'subject' => $subject->id ]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                @if (Auth::user()->teacher)
                                                    <button type="submit" class="btn btn-warning">Delete</button>
                                                @else
                                                    <button type="submit" class="btn btn-info">Leave</button>
                                                @endif
                                              </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

