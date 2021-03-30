<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Subjects;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function subjects()
    {
        $user_subjects = [];
        $user_id = Auth::user()->id;

        if (Auth::user()->teacher) {
            // subject name, description, subject code, credit value
            $user_subjects = DB::table('subjects')
            ->join('users', 'subjects.teacher_id', '=', 'users.id')
            ->where('teacher_id', $user_id)
            ->select('subjects.*')
            ->get();
            print($user_subjects);
        } else {
            // subject name, description, subject code, credit value, teacher's name
            $user_subjects = DB::table('subjects')
            ->join('subject_student', 'subjects.id', '=', 'subject_student.subject_id')
            ->join('users AS u', 'subject_student.user_id', '=', 'u.id')
            ->join('users', 'teacher_id', '=', 'users.id')
            ->where('user_id', $user_id)
            ->select('subjects.*', 'users.name as teacher')
            ->get();
        }

        return view('/subjects', [
            'user_subjects' => $user_subjects
        ]);
    }
}
