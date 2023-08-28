<x-layout>

    <h1>Modifica utente</h1>

    <br>

    <x-form-errors />

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <form action="{{route('users.update', $user->id)}}" method="post">
                
                    @csrf

                    @method('PUT')

                    <label for="nome">Nome</label>

                    <input type="text" name="nome" id="nome" class="form-control" value="{{$user->name}}">

                    <br>

                    <label for="email">Email</label>

                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">

                    <br>

                    <label for="ruolo">Ruolo</label>

                    <select name="ruolo" id="ruolo" class="form-control">

                        @foreach ($user->roles as $role_id)

                            @if ($role_id->id == '1')
                                {{$selected = 'selected'}}
                            @else
                                {{$selected = ''}}
                            @endif
                        
                        @endforeach

                        <option value="1">Admin</option>

                        <option value="2">Project manager</option>

                        <option value="3">Project intern</option>

                    </select>

                    <br>

                    <input type="submit" value="Modifica" class="btn btn-primary">

                </form>

            </div>

        </div>

    </div>

</x-layout>