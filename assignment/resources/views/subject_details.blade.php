<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subject Details') }}
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
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Code</th>
                                <th class="py-3 px-6 text-left">Credit</th>
                                <th class="py-3 px-6 text-left">Created At</th>
                                <th class="py-3 px-6 text-left">Modified At</th>
                                <th class="py-3 px-6 text-left">Number of students</th>
                                <th class="py-3 px-6 text-left">Teacher</th>
                                <th class="py-3 px-6 text-left">Email</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$subject->name}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->description}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->subject_code}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->credit}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->created_at}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->updated_at}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$students->count()}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->teacher}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$subject->email}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-bottom: 50px; margin-top: 50px; margin-left: 20px"><h1>Students</h1></div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Student Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($students as $student)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$student->student}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$student->email}}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="margin-bottom: 50px; margin-top: 50px;  margin-left: 20px"><h1>Tasks</h1></div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-green-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Task Name</th>
                                <th class="py-3 px-6 text-left">Point</th>
                                <th class="py-3 px-6 text-left">Submitted</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tasks as $task)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <a href={{ route('submit_solution', [ 'id' => $task->id ]) }} class="font-medium">{{$task->name}}</a>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$task->point}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        @if ($student_solutions->contains($task->name))
                                            <span>Yes</span>
                                        @else
                                            <span>No</span>
                                        @endif

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

