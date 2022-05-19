<div class="form-row">
    <div class="col-sm-12 mb-3 mb-sm-0">
        <label for="nome">Nome</label>
        <input type="text" class="form-control @error('name')  is-invalid @enderror " id="name" name="name"
            value="{{ old('name') ?? $company->name }}">
        @error('name')
            <div class="" role="alert">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="nuit">Nuit</label>
        <input type="number" class="form-control @error('nuit')  is-invalid @enderror " id="nuit" name="nuit"
            value="{{ old('nuit') ?? $company->nuit }}">
        @error('nuit')
            <div class="" role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="preco">Contacto</label>
        <input type="number" class="form-control @error('contact')  is-invalid @enderror " id="contact"
            name="contact" value="{{ old('contact') ?? $company->contact }}">
        @error('contact')
            <div role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email')  is-invalid @enderror" name="email" id="email"
            value=" {{ old('email') ?? $company->email }}">
        @error('email')
            <div role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>
    <div class="col-sm-6 mb-3 mb-sm-2">
        <label for="contact_alt">Contacto Alternativo</label>
        <input type="number" class="form-control @error('contact_alt')  is-invalid @enderror " id="contact_alt"
            name="contact_alt" value="{{ old('contact_alt') ?? $company->contacto_alt }}">
        @error('contact_alt')
            <div role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>

    <div class="col-sm-12 mb-3 col-md-12">
        <label for="address">Endereço</label>
        <input type="text" class="form-control @error('address')  is-invalid @enderror " id="address"
            name="address" value="{{ old('address') ?? $company->endereco }}">
        @error('address')
            <div role="alert">
                <span class="text-danger ">{{ $message }}</span>
            </div>
        @enderror
    </div>
</div>