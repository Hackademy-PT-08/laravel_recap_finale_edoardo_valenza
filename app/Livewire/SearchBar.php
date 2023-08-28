<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class SearchBar extends Component
{
    public $search;

    public function render()
    {
        if ( $this->search !== '' ) {

            $selected_projects = Project::where('title', $this->search)->get();

        } else {

            $selected_projects = [];

        }

        return view('livewire.search-bar', [

            'projects' => $selected_projects

        ]);
    }
}
