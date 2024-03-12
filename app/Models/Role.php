<?php

namespace App\Models;
;
use App\Traits\HasBelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, HasUuids, HasBelongsToTenant;

    protected $fillable = [
        'tenant_id',
        'name',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
