<x-layout title="Registrar">
    <form class="col-8 mx-auto" action="{{route('user.store')}}" method="POST">
        <h1 class="my-6">Registrar</h2>
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">nome</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">Criar</button>

        <a href="{{route('login.store')}}" class="btn btn-primary mt-3">Logar</a>
    </form>
</x-layout>
