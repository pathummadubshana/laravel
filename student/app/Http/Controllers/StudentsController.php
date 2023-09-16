<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = students::all();

        return Inertia::render(
            'students/Index',
            [
                'students' => $students
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'students/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required',
            'age' => 'required|string|max:255',
            'status' => 'required',
        ]);
        students::create([
            'title' => $request->title,
            'images' => $request->images,
            'age' => $request->age,
            'status' => $request->status
        ]);
        sleep(1);

        return redirect()->route('students.index')->with('message', 'students Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $students)
    {
        return Inertia::render(
            'students/Edit',
            [
                'students'=>$students
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required',
            'age' => 'required|string|max:255',
            'status' => 'required',
        ]);
        
            $students->title = $request->title;
            $students->images = $request->images;
            $students->age = $request->age;
            $students->status = $request->status;
            $students->save();
             sleep(1);

        return redirect()->route('students.index')->with('message', 'student Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $students)
    {
        $students->delete();
        sleep(1);

        return redirect()->route('students.index')->with('message', 'students Delete Successfully');
    }
}
