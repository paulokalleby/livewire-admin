@section('title', 'Detalhes do Papel')

<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Detalhes do Papel</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <ul class="list-group mb-3">
                <li class="list-group-item">{{ $role->name }}</li>
                <li class="list-group-item">Atualizado {{ $role->updated_at->diffForHumans() }}</li>
                <li class="list-group-item">
                    @if ($role->active)
                        <span class="badge rounded-pill badge-success-light">Ativo</span>
                    @else
                        <span class="badge rounded-pill badge-danger-light">Inativo</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>

    @if (!$users->isEmpty())
    
        <div class="row mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h5 class="text-muted">Usuários vinculados</h5>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <ul class="list-group mb-3">
                    @foreach ($users as $user)
                        <li class="list-group-item">
                            {{ $user->name }}
                            <button class="btn btn-sm btn-link float-end"
                                wire:confirm="Deseja desvincular usuário?"
                                wire:click.prevent="detach('{{ $user->id }}')">
                                <i class=" far fa-trash"></i>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif

    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-primary" wire:navigate>Retornar</a>
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-primary float-end" wire:navigate>Editar</a>
        </div>
    </div>

</div>
