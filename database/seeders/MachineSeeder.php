<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Machine;
use App\Models\Equipment;

class MachineSeeder extends Seeder
{
    public function run(): void
    {
        $machines = [
            [
                'name' => 'UNCOILER',
                'description' => 'Mesin pembuka coil',
                'equipments' => [
                    'BEARING OBB',
                    'SEGMENT MANDREL',
                    'COUPLING',
                    'AIR DISK BRAKE',
                    'PUMP LUBRIKASI',
                    'CYL HYD CPC',
                    'CYL HYD HOLD ON ROLL',
                    'DCV CPC',
                    'DCV HOLD ON ROLL',
                    'HOLD ON ROLL',
                    'FLEXIBLE HOSE CPC',
                    'FLEXIBLE HOSE HOLD ON ROLL',
                ],
            ],
            [
                'name' => 'OBB ENTRY',
                'description' => null,
                'equipments' => [
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'COIL CAR ENTRY',
                'description' => null,
                'equipments' => [
                    'BEARING RODA',
                    'CHAIN',
                    'GEARBOX',
                    'CYL HYD COIL CAR',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'DEFLECTOR ROLL ENTRY',
                'description' => null,
                'equipments' => [
                    'ROLL',
                    'BEARING',
                ],
            ],
            [
                'name' => '9 ROLL',
                'description' => null,
                'equipments' => [
                    'PINCH ROLL',
                    'BEARING PINCH ROLL',
                    'COUPLING PINCH ROLL',
                    '9 ROLL',
                    'BEARING 9 ROLL',
                    'COUPLING 9 ROLL',
                    'GEARBOX',
                    'COUPLING',
                    'AIR DISK BRAKE',
                    'CYL HYD PINCH ROLL',
                    'CYL HYD 9 ROLL',
                    'FLEXIBLE HOSE PINCH ROLL',
                    'FLEXIBLE HOSE 9 ROLL',
                    'DCV PICH ROLL',
                    'DCV 9 ROLL',
                ],
            ],
            [
                'name' => 'TAPER SHEAR ENTRY',
                'description' => null,
                'equipments' => [
                    'SHEAR',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'SHAERING',
                'description' => null,
                'equipments' => [
                    'SHEARING',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'STICHER',
                'description' => null,
                'equipments' => [
                    'STICHER',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'PICH ROLL 1',
                'description' => null,
                'equipments' => [
                    'PINCH ROLL',
                    'BAERING',
                    'COUPLING',
                    'GEARBOX',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'PICH ROLL 2',
                'description' => null,
                'equipments' => [
                    'PINCH ROLL',
                    'BAERING',
                    'COUPLING',
                    'GEARBOX',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            // ⚡ WRINGER ROLL 1 s.d. 12
            ...collect(range(1,12))->map(function($i){
                return [
                    'name' => "WRINGER ROLL $i",
                    'description' => null,
                    'equipments' => [
                        'WRINGER ROLL',
                        'BAERING',
                        'COUPLING',
                        'GEARBOX',
                        'CYL PNEUMATIC',
                        'PU',
                        'PUSH LOCK',
                        'SELENOID VALVE',
                    ],
                ];
            })->toArray(),
            [
                'name' => 'HOT AIR DRAYER',
                'description' => null,
                'equipments' => [
                    'NOZLE UDARA',
                    'BLOWER FAN UNIT',
                    'COUPLING',
                ],
            ],
            [
                'name' => 'PICH ROLL 3',
                'description' => null,
                'equipments' => [
                    'PINCH ROLL',
                    'BAERING',
                    'COUPLING',
                    'GEARBOX',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'PICH ROLL 4',
                'description' => null,
                'equipments' => [
                    'PINCH ROLL',
                    'BAERING',
                    'COUPLING',
                    'GEARBOX',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'TAPER SHEAR EXIT',
                'description' => null,
                'equipments' => [
                    'SHEAR',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'STEERING ROLL',
                'description' => null,
                'equipments' => [
                    'PINCH ROLL',
                    'BAERING',
                    'COUPLING',
                    'GEARBOX',
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'SERVO VALVE',
                ],
            ],
            [
                'name' => 'SIDE TRIMER',
                'description' => null,
                'equipments' => [
                    'BEARING SIDE TRIMER',
                    'CYL HYD OPEN CLOSE MANDREL',
                    'CYL HYD SIDE TRIMER',
                    'FLEXIBLE HOSE OPEN CLOSE',
                    'FLEXIBLE HOSE SIDE TRIMER',
                    'MOTOR HYD',
                    'FLEXIBLE HOSE MOTOR HYD',
                    'DCV OPEN CLOSE',
                    'DCV SIDE TRIMER',
                    'DCV MOTOR HYD',
                ],
            ],
            [
                'name' => '3 BRIDLE ROLL',
                'description' => null,
                'equipments' => [
                    'BRIDLE ROL 1',
                    'BRIDLE ROL 2',
                    'BRIDLE ROL 3',
                    'BEARING BR 1',
                    'BEARING BR 2',
                    'BEARING BR 3',
                    'COUPLING',
                    'GEARBOX',
                    'AIR DISK BRAKE',
                    'CYL HYDRAULIC 3 BRIDLE ROLL',
                    'FLEXIBLE HOSE',
                    'DCV HYDRAULIC 3 BRIDLE ROLL',
                    'PINCH ROLL',
                    'BEARING PINCH ROLL',
                    'CYL HYDRAULIC PINCH ROLL',
                    'FLEXIBLE HOSE',
                    'DCV PINCH ROLL',
                ],
            ],
            [
                'name' => 'OILER',
                'description' => null,
                'equipments' => [
                    'OILER',
                    'BEARING',
                    'CYL PNEUMATIC',
                    'SELENOID VALVE',
                    'PU',
                    'PUSHLOCK',
                ],
            ],
            [
                'name' => 'DEFLECTOR ROLL EXIT',
                'description' => null,
                'equipments' => [
                    'ROLL',
                    'BERARING',
                ],
            ],
            [
                'name' => 'TABLE EXIT',
                'description' => null,
                'equipments' => [
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'RECOILER',
                'description' => null,
                'equipments' => [
                    'BEARING OBB',
                    'SEGMENT MANDREL',
                    'COUPLING',
                    'AIR DISK BRAKE',
                    'PUMP LUBRIKASI',
                    'CYL HYD CPC',
                    'CYL HYD HOLD ON ROLL',
                    'SERVO VALVE CPC',
                    'DCV HOLD ON ROLL',
                    'HOLD ON ROLL',
                    'FLEXIBLE HOSE CPC',
                    'FLEXIBLE HOSE HOLD ON ROLL',
                ],
            ],
            [
                'name' => 'OBB EXIT',
                'description' => null,
                'equipments' => [
                    'CYL HYDRAULIC',
                    'FLEXIBLE HOSE',
                    'DCV',
                ],
            ],
            [
                'name' => 'TANK ACID 1',
                'description' => null,
                'equipments' => [
                    'PUMP ACID NO.1',
                    'PUMP ACID NO.2',
                    'PUMP ACID NO.3',
                    'HEAT EXCHANGER 1',
                    'HEAT EXCHANGER 2',
                ],
            ],
            [
                'name' => 'TANK ACID 2',
                'description' => null,
                'equipments' => [
                    'PUMP ACID NO.1',
                    'PUMP ACID NO.2',
                    'HEAT EXCHANGER 1',
                ],
            ],
            [
                'name' => 'TANK ACID 3',
                'description' => null,
                'equipments' => [
                    'PUMP ACID NO.1',
                    'PUMP ACID NO.2',
                    'PUMP ACID NO.3',
                    'HEAT EXCHANGER 1',
                    'HEAT EXCHANGER 2',
                ],
            ],
            [
                'name' => 'TANK POWER PACK ENTRY',
                'description' => null,
                'equipments' => [
                    'PUMP HYD 1',
                    'PUMP HYD 2',
                    'PUMP SIRCULASI',
                ],
            ],
            [
                'name' => 'TANK POWER PACK EXIT',
                'description' => null,
                'equipments' => [
                    'PUMP HYD 1',
                    'PUMP HYD 2',
                    'PUMP SIRCULASI',
                ],
            ],
        ];

        foreach ($machines as $machineData) {
            $machine = Machine::create([
                'name' => $machineData['name'],
                'description' => $machineData['description'],
            ]);

            foreach ($machineData['equipments'] as $eq) {
                Equipment::create([
                    'machine_id' => $machine->id,
                    'name' => $eq,
                ]);
            }
        }
    }
}
