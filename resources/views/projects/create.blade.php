<x-layout>

    <h1>Aggiungi nuovo progetto</h1>

    <br>

    <x-form-errors />

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
                
                    @csrf

                    <label for="titolo">Titolo</label>

                    <input type="text" name="titolo" id="titolo" class="form-control">

                    <br>

                    <label for="status">Status</label>

                    <select name="status" id="status" class="form-control">

                        <option value="Preventivato">Preventivo</option>

                        <option value="In corso">In corso</option>

                        <option value="Completato">Completato</option>

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
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach

                    </select>

                    <br>

                    <input type="submit" value="Aggiungi" class="btn btn-primary">

                </form>

            </div>

        </div>

    </div>

</x-layout>