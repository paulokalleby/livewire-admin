@section('title', 'Detalhes do Usuário')

<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Detalhes do Usuário</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="list-group mb-3">
                <li class="list-group-item">{{ $user->name }}</li>
                <li class="list-group-item">{{ $user->email }}</li>
                <li class="list-group-item">Atualizado {{ $user->updated_at->diffForHumans() }}</li>
                <li class="list-group-item">
                    @if ($user->active)
                        <span class="badge rounded-pill badge-success-light">Ativo</span>
                    @else
                        <span class="badge rounded-pill badge-danger-light">Inativo</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>

    @if (!$roles->isEmpty())

        <div class="row mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h5 class="text-muted">Papéis vinculados</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="list-group mb-3">
                    @foreach ($roles as $role)
                        <li class="list-group-item">
                            {{ $role->name }}
                            <button class="btn btn-sm btn-light float-end"
                                wire:confirm="Deseja desvincular usuário?"
                                wire:click.prevent="detach('{{ $role->id }}')">
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
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary" wire:navigate>Retornar</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary float-end" wire:navigate>Editar</a>
        </div>
    </div>
</div>
