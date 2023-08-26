<x-layout>

    <h1>Modifica progetto</h1>

    <form action="{{route('projects.update', $article->id)}}" method="post" enctype="multipart/form-data">
    
        @csrf

        <label for="titolo">Titolo</label>

        <input type="text" name="titolo" id="titolo">

        <label for="status">Status</label>

        <select name="status" id="status">

            <option value="Preventivato">Preventivo</option>

            <option value="In corso">In corso</option>

            <option value="Completato">Completato</option>

        </select>

        <label for="immagine">Immagine</label>

        <input type="file" name="immagine" id="immagine">

        <label for="utenti">Utenti</label>

        <input type="submit" value="Modifica">

    </form>

</x-layout>