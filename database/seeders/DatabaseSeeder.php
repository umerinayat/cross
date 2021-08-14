<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $basicPlans = [
            [
                "type" => "Basic",
                "total_gb" => 1,
                "price" => 7
            ],
            [
                "type" => "Basic",
                "total_gb" => 2,
                "price" => 20
            ],
            [
                "type" => "Basic",
                "total_gb" => 3,
                "price" => 30
            ],
            [
                "type" => "Basic",
                "total_gb" => 4,
                "price" => 40
            ]
        ];

        
        $premiumPlans = [
            [
                "type" => "Premium",
                "total_gb" => 1,
                "price" => 13
            ],
            [
                "type" => "Premium",
                "total_gb" => 2,
                "price" => 40
            ],
            [
                "type" => "Premium",
                "total_gb" => 3,
                "price" => 60
            ],
            [
                "type" => "Premium",
                "total_gb" => 4,
                "price" => 70
            ]
        ];


        foreach($basicPlans as $plan) {
            DB::table("plans")->insert($plan);
        }

        foreach($premiumPlans as $plan) {
            DB::table("plans")->insert($plan);
        }
        
    }
}
