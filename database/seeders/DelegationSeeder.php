<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Delegation;


class DelegationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delegation::create([
            'delegation_id' => 1,
            'nameDel' => 'Badajoz'
        ]);
        Delegation::create([
            'delegation_id' => 2,
            'nameDel' => 'Cádiz'
        ]);
        Delegation::create([
            'delegation_id' => 3,
            'nameDel' => 'Córdoba'
        ]);
        Delegation::create([
            'delegation_id' => 4,
            'nameDel' => 'Granada'
        ]);
        Delegation::create([
            'delegation_id' => 5,
            'nameDel' => 'Huelva'
        ]);
        Delegation::create([
            'delegation_id' => 6,
            'nameDel' => 'Jaén'
        ]);
        Delegation::create([
            'delegation_id' => 7,
            'nameDel' => 'Madrid'
        ]);
        Delegation::create([
            'delegation_id' => 8,
            'nameDel' => 'Málaga'
        ]);
        Delegation::create([
            'delegation_id' => 9,
            'nameDel' => 'Sevilla'
        ]);
    }
}
