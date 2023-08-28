<x-layout>

    <h1>Accedi con i tuoi dati</h1>

    <br>

    <x-form-errors />

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <form action="/login" method="post">
    
                    @csrf
            
                    <label for="email">Email</label>
            
                    <input type="email" name="email" id="email" class="form-control">

                    <br>
            
                    <label for="password">Password</label>
            
                    <input type="password" name="password" id="password" class="form-control">

                    <br>
            
                    <input type="submit" value="Accedi" class="btn btn-primary">
            
                </form>

            </div>

        </div>

    </div>

</x-layout>