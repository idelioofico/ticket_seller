@extends('app')
@section('title', env('APP_NAME').'| Detalhes-Utilizador')
@section('content')
    <h1 class="h3 text-gray-800 ml-1 mb-3 ">Detalhes Utilizador</h1>
    {{-- <div class="card o-hidden border-0 shadow-lg my-5"> --}}
        <div class="card-body p-0">

            <!-- Nested Row within Card Bodyn  -->
            <div class="row">

                <div class="col col-sm-12"></div>
                <div class="col col-sm-12 col-md-12 col-lg-8">
                    <div class="p-5">
                        <div class="card border-0 shadow-lg my-5 mb-4">
                            <div class="card-header">
                                <p>Dados</p>
                            </div>
                            <div class="card-body">
                                <form id="actualizar_dados"
                                    action="{{ route('users.actualizar-dados', $user->id) }}" method="POST">

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3">
                                            <label for="codigo">Nome</label>
                                            <input type="text" class="form-control @error('name')  is-invalid @enderror "
                                                id="name" name="name" value="{{ old('name') ?? $user->name }}">

                                            @error('name')
                                                <div class="" role="alert">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="col-sm-12 mb-3">
                                            <label for="nome">Utilizador</label>
                                            <input type="text"
                                                class="form-control @error('utilizador')  is-invalid @enderror "
                                                id="utilizador" name="utilizador"
                                                value="{{ old('utilizador') ?? $user->utilizador }}">
                                            @error('utilizador')
                                                <div class="" role="alert">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-12">
                                            <label for="nome">Email</label>
                                            <input type="text" class="form-control @error('email')  is-invalid @enderror "
                                                id="email" name="email" value="{{ old('email') ?? $user->email }}"
                                                @if (auth()->user()->id != $user->id) readonly @endif>
                                            @error('email')
                                                <div class="" role="alert">
                                                    <span class="text-danger ">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    @if (auth()->user()->role->isSuper())

                                    <div class="form-row mb-3">
                                        <label for="company_id">Estabelecimento</label>
                                        <select class="form-control custom-select @error('company_id')  is-invalid @enderror " id="company_id"
                                            name="company_id">
                                            <option value="">Selecione...</option>
                                            @foreach ($company as $item)
                                                <option value="{{ $item->id }}"  @if ($user->company_id == $item->id)
                                                    echo selected
                                            @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div role="alert">
                                                <span class="text-danger ">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="form-row mb-3">
                                        <label for="role_id">Perfil</label>
                                        <select
                                            class="form-control custom-select @error('role_id')  is-invalid @enderror "
                                            id="role_id" name="role_id"  >
                                            <option value="">Selecione...</option>
                                            @foreach ($role as $item)
                                                <option value="{{ $item->id }}" @if ($user->role_id == $item->id)
                                                    echo selected
                                            @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('perfil_id')
                                            <div role="alert">
                                                <span class="text-danger ">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">
                                        Actualizar
                                    </button>
                                    @csrf
                                </form>
                            </div>

                        </div>
                        @if (auth()->user()->id == $user->id)

                            <div class="card border-0 shadow-lg my-5">
                                <div class="card-header">
                                    Password
                                </div>
                                <div class="card-body">
                                    <form id="actualizar_password"
                                        action="{{ route('users.actualizar-password', $user->id) }}"
                                        method="POST">
                                        <div class="col col-sm-12 mb-3">
                                            <label for="preco">Password actual</label>

                                            <input type="text"
                                                class="form-control @error('password')  is-invalid @enderror " id="password"
                                                name="password">
                                            @error('password')
                                                <div role="alert">
                                                    <span class="text-danger ">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col col-sm-12 mb-3">
                                            <label for="preco">Nova password</label>

                                            <input type="text"
                                                class="form-control @error('new_password')  is-invalid @enderror "
                                                id="new_password" name="new_password">
                                            @error('new_password')
                                                <div role="alert">
                                                    <span class="text-danger ">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col col-sm-12 mb-3 ">
                                            <label for="preco">Confirmar password</label>
                                            <input type="text"
                                                class="form-control @error('new_password_confirmation')  is-invalid @enderror "
                                                id="new_password_confirmation" name="new_password_confirmation">
                                            @error('new_password_confirmation')
                                                <div role="alert">
                                                    <span class="text-danger ">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                                        @csrf
                                    </form>

                                </div>
                            </div>

                        @endif

                        @if (count($user->role->permission) >= 1)

                            <div class="card border-0 shadow-lg my-5">
                                <div class="card-header">
                                    Permissoes
                                </div>

                                <div class="card-body">
                                    <form id="actualizar_password" action="">

                                        <div class="row">
                                            @foreach ($user->role->permission as $permissao)

                                                <div class="col col-3 mb-3">
                                                    <label for="preco">

                                                        <input type="checkbox" class="checkbox"
                                                            name="{{ $permissao->description }}" value={{ $permissao->id }}
                                                            checked disabled>
                                                        {{ $permissao->description }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form>

                                </div>
                            </div>

                        @endif
                    </div>
                    {{--
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {

            $("#actualizar_dados").click(function(event) {
                event.preventDefault();
                console.log("submetendo...");
                $.ajax({
                    url: '{{ url('
                    utilizadores / actualizar - dados / ') }}' + '{{ $user->id }}',
                    method: "POST",
                    data: $("#actualizar_dados_form").serialize(),
                    success: function(response) {
                        console.log(response);
                    }.error: function(response) {
                        console.log(response)
                    }
                });
            });
        });

    </script>
@endsection
