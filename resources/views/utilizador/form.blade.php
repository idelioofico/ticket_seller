<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="codigo">Nome</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror " id="name" name="name"
            value="{{ old('name') ?? $user->name }}">

        @error('name')
            <div class="" role="alert">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div>


    {{-- <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="nome">user</label>
        <input type="text" class="form-control @error('user')  is-invalid @enderror " id="user"
            name="user" value="{{ old('user') ?? $user->user }}">
        @error('user')
            <div class="" role="alert">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div> --}}
</div>
<div class="form-row mb-3">
    <div class="col-sm-12  mb-sm-0">
        <label for="nome">Email</label>
        <input type="text" class="form-control @error('email')  is-invalid @enderror " id="email" name="email"
            value="{{ old('email') ?? $user->email }}">
        @error('email')
            <div class="" role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>

</div>

<div class="form-row mb-3">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="preco">Password</label>

        <input type="text" class="form-control @error('password')  is-invalid @enderror " id="password" name="password">
        @error('password')
            <div role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="preco">Confirmar password</label>
        <input type="text" class="form-control @error('password_confirmation')  is-invalid @enderror "
            id="password_confirmation" name="password_confirmation">
        @error('password_confirmation')
            <div role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
<div class="form-row mb-3">
    <label for="role_id">Perfil</label>
    <select class="form-control custom-select @error('role_id')  is-invalid @enderror " id="role_id"
        name="role_id">
        <option value="">Selecione...</option>
        @foreach ($role as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('role_id')
        <div role="alert">
            <span class="text-danger ">{{ $message }}</span>
        </div>
    @enderror
</div>
@php
    $user=auth()->user();
@endphp

@if ($user->role->isSuper())
<div class="form-row mb-3">
    <label for="company_id">Empresa</label>
    <select class="form-control custom-select @error('company_id')  is-invalid @enderror " id="company_id"
        name="company_id">
        <option value="">Selecione...</option>
        @foreach ($company as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('company_id')
        <div role="alert">
            <span class="text-danger ">{{ $message }}</span>
        </div>
    @enderror
</div>
@else
<div class="form-row mb-3 " hidden>
    <label for="company_id">Empresa</label>
    <input tyep="hidden" class="form-control  @error('company_id')  is-invalid @enderror " id="company_id" name="company_id" value="{{$user->company_id}}" readonly>
    @error('company_id')
        <div role="alert">
            <span class="text-danger ">{{ $message }}</span>
        </div>
    @enderror
</div> 
@endif
