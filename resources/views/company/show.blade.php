@extends('app')
@section('title', env('APP_NAME').'| Empresa-detalhes')

@section('content')

    <h1 class="h3 mb-3 ml-1 text-gray-800">
        <i class="fas fa-store fa-w"></i>
        <span class="text-primary">{{ $company->name }}</span> | <span>Detalhes</span>
    </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-6">
                <div class="card">
                    <div class="card-header">
                        Dados
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.update', $company->id) }}" method="POST">
                            @method("PATCH")
                            <div class="form-row">
                                <div class="col-sm-12 mb-3 ">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control @error('nome')  is-invalid @enderror " id="nome"
                                        name="name" value="{{ old('name') ?? $company->name }}">
                                    @error('nome')
                                        <div class="" role="alert">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>x 
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 mb-3">
                                    <label for="nome">Nuit</label>
                                    <input type="number" class="form-control @error('nuit')  is-invalid @enderror "
                                        id="nuit" name="nuit" value="{{ old('nuit') ?? $company->nuit }}">
                                    @error('nuit')
                                        <div class="" role="alert">
                                            <span class="text-danger ">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3 ">
                                    <label for="preco">Contacto</label>
                                    <input type="number" class="form-control @error('contact')  is-invalid @enderror "
                                        id="contact" name="contact"
                                        value="{{ old('contact') ?? $company->contact }}">
                                    @error('contact')
                                        <div role="alert">
                                            <span class="text-danger ">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 mb-3 ">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email')  is-invalid @enderror"
                                        name="email" id="email" value=" {{ old('email') ?? $company->email }}">
                                    @error('email')
                                        <div role="alert">
                                            <span class="text-danger ">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3 ">
                                    <label for="contacto_alt">Contacto Alternativo</label>
                                    <input type="number" class="form-control @error('contact_alt')  is-invalid @enderror "
                                        id="contacto_alt" name="contact_alt"
                                        value="{{ old('contact_alt') ?? $company->contact_alt }}">
                                    @error('contact_alt')
                                        <div role="alert">
                                            <span class="text-danger ">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-sm-12 mb-3 col-md-12">
                                    <label for="address">Endereço</label>
                                    <input type="text" class="form-control @error('address')  is-invalid @enderror "
                                        id="address" name="address"
                                        value="{{ old('address') ?? $company->address }}">
                                    @error('address')
                                        <div role="alert">
                                            <span class="text-danger ">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <button class="btn btn-float float-right btn-primary">Actualizar</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
