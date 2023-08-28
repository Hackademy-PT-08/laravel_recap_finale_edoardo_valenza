<x-layout>

    <h1>{{$project->title}}</h1>

    <br>

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                @if ($project->image_name !== '')

                    <img src="{{asset('storage/' . $project->image_name)}}" alt="{{$project->title}}" class="img-responsive">
                    
                @endif

                <p><b>Status:</b> {{$project->status}}</p>

                <p><b>Proprietario:</b> {{$project->user->name}}</p>

            </div>

        </div>

    </div>   

</x-layout>