<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourcesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        /**Orders */
        $resource = Resource::create(['name' => 'Pedidos']);

        $resource->permissions()->create([
            'name' => 'Listar',
            'slug' => 'orders.index'
        ]);

        $resource->permissions()->create([
            'name' => 'Ver',
            'slug' => 'orders.show'
        ]);

        $resource->permissions()->create([
            'name' => 'Criar',
            'slug' => 'orders.store'
        ]);

        $resource->permissions()->create([
            'name' => 'Editar',
            'slug' => 'orders.edit'
        ]);

        $resource->permissions()->create([
            'name' => 'Excluir',
            'slug' => 'orders.delete'
        ]);

        /**Catgories */
        $resource = Resource::create(['name' => 'Categorias']);

        $resource->permissions()->create([
            'name' => 'Listar',
            'slug' => 'categories.index'
        ]);

        $resource->permissions()->create([
            'name' => 'Ver',
            'slug' => 'categories.show'
        ]);

        $resource->permissions()->create([
            'name' => 'Criar',
            'slug' => 'categories.create'
        ]);

        $resource->permissions()->create([
            'name' => 'Editar',
            'slug' => 'categories.edit'
        ]);

        $resource->permissions()->create([
            'name' => 'Excluir',
            'slug' => 'categories.delete'
        ]);

        /**Products */

        $resource = Resource::create(['name' => 'Produtos']);

        $resource->permissions()->create([
            'name' => 'Listar',
            'slug' => 'products.index'
        ]);

        $resource->permissions()->create([
            'name' => 'Ver',
            'slug' => 'products.show'
        ]);

        $resource->permissions()->create([
            'name' => 'Criar',
            'slug' => 'products.create'
        ]);

        $resource->permissions()->create([
            'name' => 'Editar',
            'slug' => 'products.edit'
        ]);

        $resource->permissions()->create([
            'name' => 'Excluir',
            'slug' => 'products.delete'
        ]);

        /**Roles */

        $resource = Resource::create(['name' => 'Papéis']);

        $resource->permissions()->create([
            'name' => 'Listar',
            'slug' => 'roles.index'
        ]);

        $resource->permissions()->create([
            'name' => 'Ver',
            'slug' => 'roles.show'
        ]);
        
        $resource->permissions()->create([
            'name' => 'Criar',
            'slug' => 'roles.create'
        ]);

        $resource->permissions()->create([
            'name' => 'Editar',
            'slug' => 'roles.edit'
        ]);

        $resource->permissions()->create([
            'name' => 'Excluir',
            'slug' => 'roles.delete'
        ]);
        
        $resource->permissions()->create([
            'name' => 'Permissões',
            'slug' => 'roles.permissions'
        ]);

        /**Users */
        $resource = Resource::create(['name' => 'Usuários']);

        $resource->permissions()->create([
            'name' => 'Listar',
            'slug' => 'users.index'
        ]);

        $resource->permissions()->create([
            'name' => 'Ver',
            'slug' => 'users.show'
        ]);

        $resource->permissions()->create([
            'name' => 'Criar',
            'slug' => 'users.create'
        ]);

        $resource->permissions()->create([
            'name' => 'Editar',
            'slug' => 'users.edit'
        ]);
       
        $resource->permissions()->create([
            'name' => 'Excluir',
            'slug' => 'users.delete'
        ]);

        $resource->permissions()->create([
            'name' => 'Papéis',
            'slug' => 'users.roles'
        ]);

        /**Manager */
        $resource = Resource::create(['name' => 'Gestão']);

        $resource->permissions()->create([
            'name' => 'Relatórios',
            'slug' => 'reports'
        ]);

        $resource->permissions()->create([
            'name' => 'Configurações',
            'slug' => 'settings'
        ]);

    }
}
