<div>
    <div class="row mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h5 class="text-muted">Informações Básicas <i class="far fa-long-arrow-alt-right"></i></h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-9 offset-md-3 mb-3">
            <div class="card">
                <div class="card-body pb-3">
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Nome"
                                wire:model="form.name" />
                            @error('form.name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="button" 
                                wire:click.prevent="save"
                                wire:loading.attr="disabled" 
                                class="btn btn-primary">
                                <span wire:loading.remove>Salvar</span>
                                <span wire:loading wire:target="save">Salvando...</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    @if (session()->has('message'))
        <livewire:components.alert color="success" message="{{ session('message') }}" />
    @endif
</div>
