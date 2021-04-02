<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectFormRequest;
use App\Models\Subjects;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
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
        if(!Auth::user()->teacher){
            return abort(404);
        }

        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectFormRequest $request)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $validated_data = $request->validated();
        $user_id = Auth::user()->id;


        Subjects::create([
            'name' => $validated_data['name'],
            'description' => $validated_data['description'],
            'subject_code' => $validated_data['subject_code'],
            'credit' => $validated_data['credit'],
            'teacher_id' => $user_id,
            ]);
        return redirect()->route('subjects');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subjects $subject)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        return view('subjects.edit', [
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectFormRequest $request, Subjects $subject)
    {
        if(!Auth::user()->teacher){
            return abort(404);
        }

        $validated_data = $request->validated();
        $subject->update($validated_data);

        return redirect()->route('subject_details', [ 'id' => $subject->id ]);
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
