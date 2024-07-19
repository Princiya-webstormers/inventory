<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'Inventory Create',
                'slug' => 'inventory_create',
                'permission_group' => 'Inventory',
            ],
            [
                'name' => 'Inventory Edit',
                'slug' => 'inventory_edit',
                'permission_group' => 'Inventory',
            ],
            [
                'name' => 'Inventory Delete',
                'slug' => 'inventory_delete',
                'permission_group' => 'Inventory',
            ],

        ];
        foreach( $permissions as $key => $value){
            $permission = new Permission;
            $permission->name = $value['name'];
            $permission->slug = $value['slug'];
            $permission->permission_group = $value['permission_group'];
            $permission->save();
        }
    }
}
