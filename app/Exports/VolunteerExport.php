<?php

namespace App\Exports;

use App\Models\Volunteer;
use App\Models\Inscription;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VolunteerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $volunteers = Volunteer::select(
                            DB::raw("
                                volunteer.nameVol ,
                                volunteer.surnameVol ,
                                volunteer.surname2Vol ,
                                volunteer.birthDateVol,
                                volunteer.typeDocVol ,
                                volunteer.numDocVol ,
                                volunteer.telVol,
                                volunteer.sexVol ,
                                volunteer.shirtSizeVol,
                                volunteer.password,
                                volunteer.persMailVol ,
                                volunteer.corpMailVol ,
                                volunteer.typeViaVol,
                                volunteer.direcVol,
                                volunteer.numVol,
                                volunteer.flatVol ,
                                volunteer.aditiInfoVol,
                                volunteer.codPosVol ,
                                volunteer.stateVol ,
                                volunteer.townVol ,
                                volunteer.organiVol ,
                                volunteer.nameAuthVol ,
                                volunteer.tlfAuthVol ,
                                volunteer.numDocAuthVol,
                                GROUP_CONCAT(type_activities.nameTypeAct) as `interest`")
                            )
                            ->leftJoin('inscriptions', 'inscriptions.volunteer_id', '=', 'volunteer.id')
                            ->leftJoin('activities', 'activities.activity_id', '=', 'inscriptions.activity_id')
                            ->leftJoin('activity_type_activities', 'activity_type_activities.activity_id', '=', 'activities.activity_id')
                            ->leftJoin('type_activities', 'type_activities.typeAct_id', '=', 'activity_type_activities.typeActivity_id')
                            ->groupBy('volunteer.nameVol',
                                        'volunteer.surnameVol' ,
                                        'volunteer.surname2Vol' ,
                                        'volunteer.birthDateVol' ,
                                        'volunteer.typeDocVol' ,
                                        'volunteer.numDocVol' ,
                                        'volunteer.telVol' ,
                                        'volunteer.sexVol' ,
                                        'volunteer.shirtSizeVol' ,
                                        'volunteer.password' ,
                                        'volunteer.persMailVol' ,
                                        'volunteer.corpMailVol' ,
                                        'volunteer.typeViaVol' ,
                                        'volunteer.direcVol' ,
                                        'volunteer.numVol' ,
                                        'volunteer.flatVol' ,
                                        'volunteer.aditiInfoVol' ,
                                        'volunteer.codPosVol' ,
                                        'volunteer.stateVol' ,
                                        'volunteer.townVol' ,
                                        'volunteer.organiVol' ,
                                        'volunteer.nameAuthVol' ,
                                        'volunteer.tlfAuthVol' ,
                                        'volunteer.numDocAuthVol')
                            ->get();

    return $volunteers;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array

    {

        return [
                            'Nombre' ,
                            'Primer Apellido' ,
                            'Segundo Apellido' ,
                            'Fecha de Nacimiento',
                            'Tipo de documento' ,
                            'Documento' ,
                            'Teléfono',
                            'Sexo' ,
                            'Talla de Camiseta',
                            'Correo Personal' ,
                            'Correo Corporativo' ,
                            'Tipo de via',
                            'Dirección',
                            'Número',
                            'Planta' ,
                            'Información Adicional',
                            'Código Postal' ,
                            'Provincia' ,
                            'Localidad' ,
                            'Organización',
                            'Nombre del Autorizador',
                            'Teléfono del Autorizador',
                            'Documento del Autorizador',
                            'Intereses'
        ];
    }
}
