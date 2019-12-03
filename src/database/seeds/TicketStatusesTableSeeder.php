<?php

use Illuminate\Database\Seeder;
use App\TicketStatus;

class TicketStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketStatus::create([
            'name' => 'Abierto',
            'description' => 'Este es un ticket con estado abierto',
            'slug' => 'abierto',
        ]);
        TicketStatus::create([
            'name' => 'Cerrado',
            'description' => 'Este es un ticket con estado cerrado',
            'slug' => 'cerrado',
        ]);
    }
}
