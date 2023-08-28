<div>
    <input class="form-control mr-sm-2" type="search" placeholder="Cerca progetto" aria-label="Search" wire:model="search" wire:poll.100ms>

    <div style="width:100%; padding: 20px 0px; backgroud-color:white;">
        @foreach ($projects as $project)
            <p>{{$project->title}}</p>            
        @endforeach
    </div>
</div>
