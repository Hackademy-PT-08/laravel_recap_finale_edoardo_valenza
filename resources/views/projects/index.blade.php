<x-layout>

    <h1>Tutti i progetti</h1>

    <br>

    <a href="{{route('projects.create')}}" class="btn btn-primary">Aggiungi progetto</a>

    <br><br>

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Proprietario</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($projects as $project)

                            <tr>

                                <td>{{$project->id}}</td>
                                <td><a href="{{route('projects.show', $project->id)}}">{{$project->title}}</a></td>
                                <td>{{$project->status}}</td>
                                <td>

                                    @foreach ($project->categories as $category)
                                    
                                        {{$category->title}}, 

                                    @endforeach

                                </td>
                                <td>{{$project->user->name}}</td>
                                <td>

                                    <a href="{{route('projects.edit', $project->id)}}" class="btn btn-secondary">Modifica</a>

                                    <br><br>

                                    <form action="{{route('projects.destroy', $project->id)}}" method="post">
                                    
                                        @csrf

                                        @method('DELETE')

                                        <input type="submit" class="btn btn-secondary" value="Elimina">

                                    </form>

                                </td>

                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>

</x-layout>