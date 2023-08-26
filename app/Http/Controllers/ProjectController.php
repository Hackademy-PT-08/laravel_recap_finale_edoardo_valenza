<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Form aggiunta progetto
        $all_users = User::all();

        return view('projects.create', [

            'users' => $all_users

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //Aggiungo record nel database
        $project = new Project;

        $project->title = $request->titolo;
        $project->status = $request->status;

        $image = $request->file('immagine');

        if ($image) {

            $imageId = uniqid();

            $fileName = 'image-project-' . $imageId . '.' . $image->extension();

            $save_image = $image->storeAs('public', $fileName);

            $project->image_name = $fileName;
            $project->image_id = $imageId;

        } else {

            $project->image_name = '';
            $project->image_id = '';

        }

        $project->user_id = auth()->user()->id;

        $project->save();

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Form di modifica progetto
        $project = Project::find($id);

        return view('projects.edit', [

            'project' => $project

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
