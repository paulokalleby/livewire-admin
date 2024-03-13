@section('title', 'Editar Usuário')

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

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email"
                                wire:model="form.email" />
                            @error('form.email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" placeholder="Senha"
                                wire:model="form.password" />
                            @error('form.password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmação da senha</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="Confirmação da senha" wire:model="form.password_confirmation" />
                            @error('form.password_confirmation')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6">
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


    @can('users.roles')
        @if (!$roles->isEmpty())
            <div class="row mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h5 class="text-muted">Papéis</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="row">

                                @foreach ($roles as $index => $item)
                                    <div class="mb-3 col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="form.role.{{ $item->id }}" id="role-{{ $item->slug }}" />
                                            <label class="form-check-label" for="role-{{ $item->slug }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endcan

    <div class="row">
        <div class="col-12 mb-3">
            <button type="button" wire:click.prevent="update" wire:loading.attr="disabled" class="btn btn-primary">
                <span wire:loading.remove wire:target="update">Atualizar</span>
                <span wire:loading wire:target="update">Atualizando...</span>
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary" wire:navigate>Cancelar</a>
            <a href="{{ route('users.show', $form->uuid) }}" class="btn btn-outline-primary float-end"
                wire:navigate>Detalhes</a>
        </div>
    </div>
</div>
