@php
$permissao=$perfil->permission->pluck('id')->toArray();

@endphp
<div class="row">
    <div class="col col-md-6">
        <label for="nome">Descrição</label>
        <br>
        <input type="text" class="form-control @error('nome') border-danger @enderror" name="name" id="name"
            value="{{ old('nome') ?? $perfil->name }}">
        <br>
        <div>
            @error('nome')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col col-sm-12 col-md-6 col-lg-4 mb-3">

        <div class="row">

            <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                <ul class="list-goup">

                    <li class="list-group-item active">
                        <label>
                            <input type="checkbox" name="permissao[]" value="1" @if (in_array(1, $permissao)) checked @endif
                            aria-label="Checkbox for following text input">
                            Dashboard
                        </label>
                    </li>
                </ul>
            </div>

            <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                <ul class="list-goup">

                    <li class="list-group-item active">
                        <label>
                            <input type="checkbox" name="permissao[]" value="15" @if (in_array(16, $permissao)) checked @endif
                            aria-label="Checkbox for following text input">
                            Pagamentos
                        </label>
                    </li>
                </ul>
            </div>

            <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
                <ul class="list-goup">

                    <li class="list-group-item active">
                        <label>
                            <input type="checkbox" name="permissao[]" value="20" @if (in_array(20, $permissao)) checked @endif
                            aria-label="Checkbox for following text input">
                            Estabelecimento
                        </label>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col col-sm-12 col-md-6 col-lg-4 mb-3">

        <ul class="list-group">

            <li class="list-group-item active">
                <label>
                    <input type="checkbox" name="permissao[]" @if (in_array(2, $permissao)) checked @endif value="2"
                    aria-label="Checkbox for following text input">
                    Produtos
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="3" @if (in_array(3, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Registar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="4" @if (in_array(4, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    editar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="5" @if (in_array(5, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    apagar
                </label>
            </li>
        </ul>
    </div>

    <div class="col col-sm-12 col-md-6 col-lg-4 mb-3">

        <ul class="list-group">


            <li class="list-group-item active">
                <label>
                    <input type="checkbox" name="permissao[]" value="6" @if (in_array(6, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Clientes
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="7" @if (in_array(7, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Registar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="8" @if (in_array(8, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    editar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="9" @if (in_array(9, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    apagar
                </label>
            </li>
        </ul>
    </div>
    <div class="col col-sm-12 col-md-6 col-lg-4 mb-3">

        <ul class="list-group">

            <li class="list-group-item active">
                <label>
                    <input type="checkbox" name="permissao[]" value="10" @if (in_array(10, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Contas
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="11" @if (in_array(11, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Registar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="14" @if (in_array(13, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Consultar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="12" @if (in_array(14, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    editar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="14" @if (in_array(15, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Efectuar Pagamento
                </label>
            </li>
        </ul>
    </div>

    <div class="col col-sm-12 col-md-6 col-lg-4 ">

        <ul class="list-group">

            <li class="list-group-item active">
                <label>
                    <input type="checkbox" name="permissao[]" value="16" @if (in_array(17, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Utilizadores
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="17" @if (in_array(18, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    Registar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="18" @if (in_array(19, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    editar
                </label>
            </li>
            <li class="list-group-item">
                <label>
                    <input type="checkbox" name="permissao[]" value="19" @if (in_array(19, $permissao)) checked @endif aria-label="Checkbox
                    for following text input">
                    apagar
                </label>
            </li>
        </ul>
    </div>
</div>
