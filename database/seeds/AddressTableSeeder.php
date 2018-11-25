<?php
use App\Address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'fullname' => 'Allen Chong',
            'email' => 'allenchong@gmail.com',
            'phone' => '0112255253',
            'city' => 'Puchong',
            'state' => 47100,
            'country' => 'Malaysia',
            'full_address' => 'Taman Jaya',
        ]);
    }
}
