<?php

namespace Database\Seeders;

use App\Models\HRActionCategory;
use App\Models\HRActionType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'ALTA DE EMPLEADO',
                'items' => [
                    [
                        'name' => 'Nuevo ingreso',
                        'label' => 'Salario Lps.',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Reingreso',
                        'label' => 'Salario Lps.',
                        'has_comments' => 1
                    ],
                ]
            ],
            [
                'name' => 'MOVIMIENTOS QUE AFECTAN PLANILLA',
                'items' => [
                    [
                        'name' => 'Promocion',
                        'label' => 'Al puesto',
                        'has_comments' => 1
                    ],
                    [
                        'name' => 'Permiso sin goce de sueldo',
                        'label' => null,
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Nivelación Salarial',
                        'label' => 'A moneda local',
                        'has_comments' => 1
                    ],
                    [
                        'name' => 'Falta injustificada',
                        'label' => 'Descuento salarial',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Vacaciones',
                        'label' => null,
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Llegadas tardias',
                        'label' => 'Descuento salarial',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Incapacidad fisica',
                        'label' => 'Anexar documento del seguro social',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Suspension',
                        'label' => 'Descuento salarial',
                        'has_comments' => 0
                    ],
                ]
            ],
            [
                'name' => 'MOVIMIENTOS QUE NO AFECTAN PLANILLA',
                'items' => [
                    [
                        'name' => 'Amonestacion escrita',
                        'label' => 'Anexar carta',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Permiso con goce de sueldo',
                        'label' => null,
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Amonestacion verbal',
                        'label' => 'Indicar situacion',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Cita medica',
                        'label' => null,
                        'has_comments' => 0
                    ],
                ]
            ],
            [
                'name' => 'BAJA DE EMPLEADO',
                'items' => [
                    [
                        'name' => 'Renuncia',
                        'label' => 'Anexar carta de renuncia',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Despido',
                        'label' => 'Anexar carta de despido',
                        'has_comments' => 0
                    ],
                    [
                        'name' => 'Abandono de labores',
                        'label' => 'Sin notificacion por mas de 48 horas. Anexar carta de abandono de labores',
                        'has_comments' => 0
                    ],
                ]
            ],
        ];

        foreach($data as $item) {
            $action = HRActionCategory::create([
                'name' => $item['name'],
            ]);
            foreach($item['items'] as $item) {
                HRActionType::create([
                    'name' => $item['name'],
                    'label' => $item['label'],
                    'has_comments' => $item['has_comments'],
                    'category_id' => $action->id
                ]);
            }
        }
    }
}
