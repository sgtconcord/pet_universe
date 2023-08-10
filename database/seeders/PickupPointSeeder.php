<?php

namespace Database\Seeders;

use App\Models\PickupPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PickupPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PickupPoint::create([
            'pickup_point_name' => 'Rampura',
            'pickup_point_address' => 'Rampura TV center',
            'pickup_point_phone' => '01988776655',
            'pickup_point_phone_two' => '01788776655',
            'status' => PickupPoint::$statusArrays[0],
        ]);
        PickupPoint::create([
            'pickup_point_name' => 'Malibagh',
            'pickup_point_address' => 'Malibagh Dhaka',
            'pickup_point_phone' => '01988334422',
            'pickup_point_phone_two' => '01677225533',
            'status' => PickupPoint::$statusArrays[0],
        ]);
        PickupPoint::create([
            'pickup_point_name' => 'Komolapur',
            'pickup_point_address' => 'Komolapur Dhaka',
            'pickup_point_phone' => '01677662255',
            'pickup_point_phone_two' => '01899772266',
            'status' => PickupPoint::$statusArrays[0],
        ]);
    }
}
