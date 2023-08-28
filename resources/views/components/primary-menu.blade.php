<div class="container-fluid">

    <div class="row">

        <div class="col-xs-12">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('index')}}">Gestionale</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('projects.index')}}">Progetti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profilo utente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">Gestione utenti</a>
                    </li>
                    </ul>
                    @livewire('search-bar')
                </div>
            </nav>

        </div>

    </div>

</div>

<br>