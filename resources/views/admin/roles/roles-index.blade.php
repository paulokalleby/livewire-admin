@section('title', 'Papéis')

<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Papéis</h3>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3">
            <input class="form-control mb-3" placeholder="Nome" type="text" wire:model.live="name" />
        </div>
        <div class="col-md-2">
            <select class="form-control form-select mb-3" wire:model.live="status">
                <option value="">Status</option>
                <option value="1">Ativos</option>
                <option value="0">Inativos</option>
            </select>
        </div>
        <div class="col-md-7">
            <button type="button" class="btn btn-light bg-white float-start mb-3" wire:loading.attr="disabled"
                wire:click="resetFilters">
                <i wire:target="resetFilters" wire:loading.class="fa-pulse" class="fal fa-sync-alt"></i>
            </button>
            <a href="{{ route('roles.create') }}" class="btn btn-primary float-end mb-3" wire:navigate>
                <i class="fal fa-plus"></i> Novo
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            @if ($roles->isEmpty())
                <p class="text-center py-4">Nenhum registro encontrado!</p>
            @else
                <div class="card ">
                    <table class="table pb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Atualizado</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($role->active)
                                            <span class="badge rounded-pill badge-success-light">Ativo</span>
                                        @else
                                            <span class="badge rounded-pill badge-danger-light">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-light"
                                            wire:navigate>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-light"
                                            wire:navigate>
                                            <i class="far fa-pen"></i>
                                        </a>
                                        <button class="btn btn-sm btn-light" @disabled($role->users->count() > 0)
                                            wire:confirm="Deseja excluir registro?"
                                            wire:click.prevent="delete('{{ $role->id }}')">
                                            <i class=" far fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="d-flex justify-content-center">
                    {{ $roles->onEachSide(1)->links() }}
                </div>

            @endif

        </div>
    </div>

</div>
