@section('title', 'Detalhes do Usuário')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-0">
                    <dl class="row pb-0">
                        <dt class="col-sm-2">Nome</dt>
                        <dd class="col-sm-10">{{ $user->name }}</dd>
                        <dt class="col-sm-2">Email</dt>
                        <dd class="col-sm-10">{{ $user->email }}</dd>
                        <dt class="col-sm-2">Atualizado</dt>
                        <dd class="col-sm-10">{{ $user->updated_at->diffForHumans() }}</dd>
                        <dt class="col-sm-2">Status</dt>
                        <dd class="col-sm-10">
                            @if ($user->active)
                                <span class="badge rounded-pill badge-success-light">Ativo</span>
                            @else
                                <span class="badge rounded-pill badge-danger-light">Inativo</span>
                            @endif
                        </dd>
                </div>
            </div>
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
            <a href="{{ route('users.index') }}" 
                class="btn btn-outline-primary" 
                title="Retornar"
                wire:navigate>
                Retornar
            </a>
            <a href="{{ route('users.edit', $user->id) }}" 
                class="btn btn-outline-primary float-end"
                title="Editar" 
                wire:navigate>
                Editar
            </a>
        </div>
    </div>
</div>
