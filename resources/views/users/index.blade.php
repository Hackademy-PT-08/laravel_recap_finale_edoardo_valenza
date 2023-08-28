<x-layout>

    <h1>Tutti gli utenti</h1>

    <br><br>

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)

                            <tr>

                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>

                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-secondary">Modifica</a>

                                    <br><br>

                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                    
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