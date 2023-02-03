<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeActivity;

class TypeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeActivity::create([
            'typeAct_id' => 1,
            'nameTypeAct' => '1. Voluntariado medioambiental',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 2,
            'nameTypeAct' => '2. Voluntariado comunitario',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 3,
            'nameTypeAct' => '3. Voluntariado socio-sanitario y educación para la salud',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 4,
            'nameTypeAct' => '4. Voluntariado cultural y patrimonio histórico  artístico',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 5,
            'nameTypeAct' => '5. Voluntariado educativo',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 6,
            'nameTypeAct' => '6. Voluntariado deportivo',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 7,
            'nameTypeAct' => '7. Voluntariado internacional',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 8,
            'nameTypeAct' => '7.1. Cooperación al desarrollo',
            'descTypeAct' => '',
            'sonOf' => 7,
        ]);
        TypeActivity::create([
            'typeAct_id' => 9,
            'nameTypeAct' => '7.2. Comercio justo',
            'descTypeAct' => '',
            'sonOf' => 7,
        ]);
        TypeActivity::create([
            'typeAct_id' => 10,
            'nameTypeAct' => '8. Voluntariado de ocio y tiempo libre',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 11,
            'nameTypeAct' => '9. Voluntariado de protección civil y ayuda humanitaria',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 12,
            'nameTypeAct' => '10. Voluntariado social',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 13,
            'nameTypeAct' => '10.1. Adicciones y dependencias',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 14,
            'nameTypeAct' => '10.2. Discapacidad',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 15,
            'nameTypeAct' => '10.3. Infancia, juventud y familia',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 16,
            'nameTypeAct' => '10.4. Inmigración y refugio',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 17,
            'nameTypeAct' => '10.5. Reclusos y ex-reclusos',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 18,
            'nameTypeAct' => '10.6. Personas sin hogar',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 19,
            'nameTypeAct' => '10.7. Tercera edad',
            'descTypeAct' => '',
            'sonOf' => 12,
        ]);
        TypeActivity::create([
            'typeAct_id' => 20,
            'nameTypeAct' => '11. Voluntariado en promoción de la igualdad de oportunidades ',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 21,
            'nameTypeAct' => '12. Voluntariado en derechos humanos y pacifismo',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
        TypeActivity::create([
            'typeAct_id' => 22,
            'nameTypeAct' => '13. Voluntariado en entidades y organizaciones',
            'descTypeAct' => '',
            'sonOf' => null,
        ]);
    }
}
