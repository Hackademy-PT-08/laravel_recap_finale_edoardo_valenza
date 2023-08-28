<x-layout>

    <h1>Modifica progetto</h1>

    <br>

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <form action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data">
            
                    @csrf

                    @method('PUT')

                    <label for="titolo">Titolo</label>

                    <input type="text" name="titolo" id="titolo" class="form-control" value="{{$project->title}}">

                    <br>

                    <label for="status">Status</label>

                    <select name="status" id="status" class="form-control">

                        <option value="Preventivato" {{ ( $project->status == 'Preventivato' ? 'selected' : '' ) }}>Preventivo</option>

                        <option value="In corso" {{ ( $project->status == 'In corso' ? 'selected' : '' ) }}>In corso</option>

                        <option value="Completato" {{ ( $project->status == 'Completato' ? 'selected' : '' ) }}>Completato</option>

                    </select>

                    <br>

                    <label for="immagine">Immagine</label>

                    <input type="file" name="immagine" id="immagine" class="form-control">

                    <br>

                    <label for="categorie">Categorie</label>

                    <select name="categorie[]" id="categorie" class="form-control" multiple>

                        <option value="1">Web app</option>

                        <option value="2">Siti web</option>

                        <option value="3">Ecommerce</option>

                    </select>

                    <br>

                    <label for="utenti">Utenti</label>

                    <select name="utenti[]" id="utenti" class="form-control" multiple>

                        @foreach ($users as $user)
                            <option value="{{$user->id}}" {{ ( $project->user->id == $user->id ? 'selected' : '' ) }}>{{$user->name}}</option>
                        @endforeach

                    </select>

                    <br>

                    <input type="submit" value="Modifica" class="btn btn-primary">

                </form>

            </div>

        </div>

    </div>   

</x-layout>