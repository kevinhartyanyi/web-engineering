<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Subjects;
use App\Models\Solutions;
use App\Models\Tasks;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SolutionFormRequest;
use Facade\IgnitionContracts\Solution;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function subjects()
    {
        $user_subjects = [];
        $user_id = Auth::user()->id;

        if (Auth::user()->teacher) {
            // subject name, description, subject code, credit value
            $user_subjects = DB::table('subjects')
            ->join('users', 'subjects.teacher_id', '=', 'users.id')
            ->where('subjects.deleted_at', null)
            ->where('teacher_id', $user_id)
            ->select('subjects.*')
            ->get();
        } else {
            // subject name, description, subject code, credit value, teacher's name
            $user_subjects = DB::table('subjects')
            ->join('subject_student', 'subjects.id', '=', 'subject_student.subject_id')
            ->join('users AS u', 'subject_student.user_id', '=', 'u.id')
            ->join('users', 'teacher_id', '=', 'users.id')
            ->where('subjects.deleted_at', null)
            ->where('user_id', $user_id)
            ->select('subjects.*', 'users.name as teacher')
            ->get();
        }
        //print($user_subjects);
        return view('/subjects', [
            'user_subjects' => $user_subjects
        ]);
    }

    public function take()
    {
        if(Auth::user()->teacher){
            return abort(404);
        }

        $user_id = Auth::user()->id;
        $student_subjects = DB::table('subjects')
        ->join('subject_student', 'subjects.id', '=', 'subject_student.subject_id')
        ->join('users AS u', 'subject_student.user_id', '=', 'u.id')
        ->where('subjects.deleted_at', null)
        ->where('user_id', $user_id)
        ->select('subjects.id')
        ->get()
        ->pluck('id');

        $all_subjects = DB::table('subjects')
        ->where('subjects.deleted_at', null)
        ->select('subjects.id')
        ->get()
        ->pluck('id');

        // print($student_subjects);
        // print($all_subjects);

        $diff = $all_subjects->diff($student_subjects);

        $user_subjects = DB::table('subjects')
            ->join('users', 'teacher_id', '=', 'users.id')
            ->where('subjects.deleted_at', null)
            ->whereIn('subjects.id', $diff)
            ->select('subjects.*', 'users.name as teacher')
            ->get();

        return view('/take', [
            'user_subjects' => $user_subjects
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function take_subject($id)
    {
        if(Auth::user()->teacher){
            return abort(404);
        }

        $subject = Subjects::where('id', $id)->get()->first();
        $subject->students()->attach(Auth::user());
        return redirect()->route('subjects');
    }

    public function subject_details($id)
    {
        // subject name, description, code, credits, created at and last modification date, number of assigned students, teacher name and email address.
        // list of students' names and email addresses who have taken this subject
        $subject = DB::table('subjects')
            ->join('users', 'teacher_id', '=', 'users.id')
            ->where('subjects.deleted_at', null)
            ->where('subjects.id', $id)
            ->select('subjects.*', 'users.name as teacher', 'users.email as email')
            ->get()
            ->first();
        $students = DB::table('subjects')
            ->join('subject_student', 'subjects.id', '=', 'subject_student.subject_id')
            ->join('users', 'subject_student.user_id', '=', 'users.id')
            ->where('subjects.deleted_at', null)
            ->where('subjects.id', $id)
            ->select('users.name as student', 'users.email as email')
            ->get();


        $tasks = DB::table('tasks')
            ->where('subjects_id', $id)
            ->select('tasks.id as id', 'tasks.name as name', 'tasks.point as point')
            ->get();

        $user_id = Auth::user()->id;

        $student_solutions = DB::table('tasks')
            ->join('solutions', 'solutions.tasks_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'solutions.user_id')
            ->where('users.id', $user_id)
            ->where('subjects_id', $id)
            ->select('tasks.name as name')
            ->get()
            ->pluck('name');

        return view('/subject_details', [
            'subject' => $subject,
            'students' => $students,
            'tasks' => $tasks,
            'student_solutions' => $student_solutions,
        ]);
    }

    public function submit_solution($id)
    {
        if(Auth::user()->teacher){
            return abort(404);
        }

        $task = DB::table('tasks')
            ->join('subjects', 'subjects.id', '=', 'tasks.subjects_id')
            ->join('users', 'subjects.teacher_id', '=', 'users.id')
            ->where('tasks.id', $id)
            ->select('tasks.id as id','subjects.name as subject', 'tasks.description as description', 'tasks.point as point', 'users.name as teacher')
            ->get()
            ->first();

        return view('/submit_solution', [
            'task' => $task,
        ]);
    }

    public function save_solution(SolutionFormRequest $request, int $task_id )
    {
        if(Auth::user()->teacher){
            return abort(404);
        }

        $validated_data = $request->validated();
        $user_id = Auth::user()->id;
        Solutions::create([
            'answer' => $validated_data['solution'],
            'submit' => date("Y-m-d"),
            'user_id' => $user_id,
            'tasks_id' => $task_id,
            ]);

        return redirect()->route('subjects');
    }

    public function create_subject()
    {
        return view('/create_subject');
    }

    public function save_subject()
    {
        //return view('/create_subject');
    }

    public function subject_remove(int $subject_id)
    {
        $subject = Subjects::where('id', $subject_id)->get()->first();
        if (Auth::user()->teacher) {
            $subject->delete();
        } else {
            $user_id = Auth::user()->id;

            $subject_student = DB::table('subjects')
            ->join('subject_student', 'subjects.id', '=', 'subject_student.subject_id')
            ->join('users', 'subject_student.user_id', '=', 'users.id')
            ->where('user_id', $user_id)
            ->where('subjects.id', $subject->id)
            ->select('subject_student.*')
            ->first();
            //print($subject_student->id);
            DB::table('subject_student')
            ->where('id', $subject_student->id)
            ->delete();
        }

        return redirect()->route('subjects');
    }
}
