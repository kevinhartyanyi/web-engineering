<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskFormRequest;
use App\Models\Subjects;
use App\Models\Solutions;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('tasks.create', [
        //     'subject_id' => $subject->id,
        // ]);
    }

    public function create_task(int $subject_id)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }
        return view('tasks.create', [
            'subject_id' => $subject_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subjects $subjects, TaskFormRequest $request)
    {
        // Tasks::create([
        //     'name' => $validated_data['name'],
        //     'description' => $validated_data['description'],
        //     'point' => $validated_data['point'],
        //     'subjects_id' => $id,
        //     ]);
    }

    public function save_task(TaskFormRequest $request, int $subject_id )
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $validated_data = $request->validated();

        Tasks::create([
            'name' => $validated_data['name'],
            'description' => $validated_data['description'],
            'point' => $validated_data['point'],
            'subjects_id' => $subject_id,
            ]);
        return redirect()->route('subject_details', [ 'id' => $subject_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $task)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $solutions = Solutions::where('tasks_id', $task->id)
            ->join('users', 'users.id', 'solutions.user_id')
            ->get();

        return view('tasks.show', [
            'task' => $task,
            'solutions' => $solutions,
        ]);
    }

    public function task_solution(int $solution_id)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $solution = DB::table('solutions')
            ->join('tasks', 'tasks.id', 'solutions.tasks_id')
            ->where('solutions.id', $solution_id)
            ->get()
            ->first();

        return view('tasks.solution', [
            'solution' => $solution,
        ]);
    }

    public function evaluate_solution(Request $request, int $solution_id)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $solution = DB::table('solutions')
            ->join('tasks', 'tasks.id', 'solutions.tasks_id')
            ->where('solutions.id', $solution_id)
            ->get()
            ->first();


        $validated = $request->validate([
            'point' => "required|numeric|min:0|max:{$solution->point}",
        ]);

        $solution_update = Solutions::find($solution_id);
        $solution_update->fill([
            'evaluation_point' => $validated['point'],
            'evaluation_date' =>  date("Y-m-d"),
            ])->save();

        return redirect()->route('tasks.show', [ 'task' => $solution->tasks_id ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $task)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskFormRequest $request, Tasks $task)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $validated_data = $request->validated();
        $task->update($validated_data);

        return redirect()->route('tasks.show', [ 'task' => $task->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
