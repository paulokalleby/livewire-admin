@section('title', 'Dashboard')

<div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="row mb-2 mb-xl-3">
        <div class="col-md-6">
            <livewire:admin.dashboard.dashboard-card title="Papéis" icon="user-lock" info="{{ $roles }}" />
        </div>
        <div class="col-md-6">
            <livewire:admin.dashboard.dashboard-card title="Usuários" icon="users" info="{{ $users }}" />
        </div>
    </div>
</div>
