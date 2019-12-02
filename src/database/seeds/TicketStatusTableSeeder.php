<?php

use Illuminate\Database\Seeder;

class TicketStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_status')->insert([
            'name' => 'Abierto',
            'description' => 'Este es un ticket con estado abierto',
            'slug' => 'abierto',
        ]);

        DB::table('ticket_status')->insert([
            'name' => 'Cerrado',
            'description' => 'Este es un ticket con estado cerrado',
            'slug' => 'cerrado',
        ]);
    }
}
