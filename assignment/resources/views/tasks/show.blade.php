<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="inline-block mr-2 mt-2">
                    <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">Edit Task</a>
                </div>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-blue-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Point</th>
                                <th class="py-3 px-6 text-left">Number of submitted solutions</th>
                                <th class="py-3 px-6 text-left">Number of evaluated solutions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$task->name}}</span>
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
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solutions->count()}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solutions->where('evaluation_date', '!=', null)->count()}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-bottom: 50px; margin-top: 50px;  margin-left: 20px"><h1>Solutions</h1></div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-green-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Submitted</th>
                                <th class="py-3 px-6 text-left">Student</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Evaluation Date</th>
                                <th class="py-3 px-6 text-left">Earned Points</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($solutions as $solution)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span>{{$solution->submit}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solution->name}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solution->email}}</span>
                                    </div>
                                </td>
                                @if ($solution->evaluation_point != null)
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solution->evaluation_date}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$solution->evaluation_point}}</span>
                                    </div>
                                </td>
                                @else
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="inline-block mr-2 mt-2">
                                            <a href="{{ route('task_solution', [ 'id' => $solution->id ]) }}" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">Evaluate Task</a>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

