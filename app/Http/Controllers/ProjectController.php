<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostro tutti i progetti
        $all_projects = Project::all();

        return view('projects.index', [

            'projects' => $all_projects

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id !== '3') {

                //Form aggiunta progetto
                $all_users = User::all();

                return view('projects.create', [

                    'users' => $all_users

                ]);

            } else {

                return redirect()->route('index');

            }

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id !== '3') {

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

                //Aggiungo relazione con categorie
                $selected_categories = $request->categorie;

                $current_project = Project::find($project->id);

                foreach ( $selected_categories as $selected_category ) {

                    $current_project->categories()->attach($selected_category);

                }

                //Aggiungo relazione con utenti
                $selected_users = $request->utenti;

                $current_project = Project::find($project->id);

                foreach ( $selected_users as $selected_user ) {

                    $current_project->users()->attach($selected_user);

                }

                return redirect()->route('projects.index');
            
            } else {

                return redirect()->route('index');

            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Mostro dettagli progetto
        $single_project = Project::find($id);

        return view('projects.show', [

            'project' => $single_project

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id !== '3') {

                //Form di modifica progetto
                $project = Project::find($id);

                $all_users = User::all();

                return view('projects.edit', [

                    'project' => $project,
                    'users' => $all_users

                ]);

            } else {

                return redirect()->route('index');

            }

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Aggiorno record nel database
        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id !== '3') {

                //Aggiungo record nel database
                $project = Project::find($id);

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

                //Aggiungo relazione con categorie
                $project->categories()->detach();

                $selected_categories = $request->categorie;

                foreach ( $selected_categories as $selected_category ) {

                    $project->categories()->attach($selected_category);

                }

                //Aggiungo utenti al progetto
                $project->users()->detach();

                $selected_users = $request->utenti;

                foreach ( $selected_users as $selected_user ) {

                    $project->users()->attach($selected_user);

                }

                return redirect()->route('projects.edit', $project->id);

            } else {

                return redirect()->route('index');

            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $current_user = User::find(auth()->user()->id);

        foreach ($current_user->roles as $role) {

            if ($role->id !== '3') {

                //Elimino record dal database
                $project = Project::find($id);

                $project->delete();

                return redirect()->route('projects.index');

            } else {

                return redirect()->route('index');

            }

        }
    }
}
