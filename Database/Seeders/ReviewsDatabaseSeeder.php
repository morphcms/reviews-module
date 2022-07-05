<?php

namespace Modules\Reviews\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Arabic;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ReviewsDatabaseSeeder extends Seeder
{
    protected array $permissions = [
        '*',
        'view',
        'viewAny',
        'create',
        'update',
        'delete',
        'replicate',
    ];

    protected string $resource = 'reviews';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $admin = Role::findByName('admin');

        foreach ($this->permissions as $permission){
            Permission::create([
                'name' => $this->resource . '.' . $permission,
            ]);
        }

        $admin->givePermissionTo($this->resource . '.*');
    }
}
