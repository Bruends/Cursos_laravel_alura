<x-layout title="Login">
    <form class="col-8 mx-auto" action="{{route('login.store')}}" method="POST">
        <h1 class="my-6">Login</h2>
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">Entrar</button>

        <a href="{{route('user.create')}}" class="btn btn-primary mt-3">Registrar</a>
    </form>
</x-layout>
