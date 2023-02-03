<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Volunteer;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Volunteer::create([
            'nameVol' => 'Rocio',
            'surnameVol' => 'Ciero',
            'surname2Vol' => 'Reche',
            'birthDateVol' => '1987-08-09',
            'typeDocVol' => 'DNI',
            'numDocVol' => '28829681D',
            'telVol' => '658831279',
            'sexVol' => 'Mujer',
            'shirtSizeVol' => 'S',
            'password' => '$2y$10$v9zMvtc3nfnKl1Rg2lW7/enD6ka0UU45RpHs2hSS/W94T/.y/IztG',
            'persMailVol' => 'rocio.ciero@magtel.es',
            'typeViaVol' => 'Calle',
            'direcVol' => 'Gabriel Ramos Bejarano',
            'numVol' => '114',
            'flatVol' => 'Bajo',
            'aditiInfoVol' => '3',
            'codPosVol' => '14014',
            'stateVol' => 'Córdoba',
            'townVol' => 'Córdoba',
            'imageVol' => false,
            'organiVol' => false,
            /********/
            'isLoggeable' => 1,
            'isAdminVol' => 1,
            'isInternVol' => 0,
            'isRegisterComplete' => 1,

        ]);
        Volunteer::create([
            'nameVol' => 'Admin',
            'surnameVol' => 'Admin',
            'surname2Vol' => 'Admin',
            'birthDateVol' => '1986-06-28',
            'typeDocVol' => 'DNI',
            'numDocVol' => '96246880E',
            'telVol' => '957123456',
            'sexVol' => 'Hombre',
            'shirtSizeVol' => 'M',
            'password' => '$2y$10$rmooK2aT5wKFaGxiSsYfQ.5dLOqTQm/2.ToIeULV/FAixlSLcVSyO',
            'persMailVol' => 'antonio.lopezlopezNormal@magtel.es',
            'typeViaVol' => 'Autopista',
            'direcVol' => 'Admin',
            'numVol' => 'Admin',
            'flatVol' => 'Admin',
            'aditiInfoVol' => 'Admin',
            'codPosVol' => '14014',
            'stateVol' => 'Córdoba',
            'townVol' => 'Córdoba',
            'imageVol' => false,
            'organiVol' => false,
            /********/
            'isLoggeable' => 1,
            'isAdminVol' => 1,
            'isInternVol' => 0,
            'isRegisterComplete' => 1,

        ]);
    }
}
