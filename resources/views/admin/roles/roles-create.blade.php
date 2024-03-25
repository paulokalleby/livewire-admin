@section('title', 'Cadastrar Papel')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="active"
                                    wire:model="form.active" />
                                <label class="form-check-label" for="active">Ativo</label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('roles.permissions')
        <div class="row mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h5 class="text-muted">
                    Permissões
                </h5>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <button wire:click.prevent="selectAll" type="button" class="btn btn-sm btn-light">
                                    Selecionar Tudo
                                </button>
                                <button wire:click.prevent="clearSelection" type="button" class="btn btn-sm btn-light">
                                    Limpar Seleção
                                </button>
                            </div>
                        </div>
                        <div class="row">

                            @foreach ($resources as $resource)
                                <div class="col-md-2 mb-3">
                                    <h6 class="mb-2">{{ $resource->name }}</h6>
                                    @foreach ($resource->permissions as $index => $item)
                                        <div class="form-check form-switch_">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="form.permission.{{ $item->id }}" id="permission-{{ $item->slug }}" />
                                            <label class="custom-control-label" for="permission-{{ $item->slug }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan


    <div class="row">
        <div class="col-12 mb-3">
            <button type="button" 
                wire:click.prevent="store"
                wire:loading.attr="disabled" 
                class="btn btn-primary">
                <span wire:loading.remove wire:target="store">Salvar</span>
                <span wire:loading wire:target="store">Salvando...</span>
            </button>
            <a href="{{ route('roles.index') }}" class="btn btn-outline-primary" wire:navigate>Cancelar</a>
        </div>
    </div>
    
</div>
