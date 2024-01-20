<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'id'=> 1,
                'name'=> 'GD 923',
                'image'=> '1.jpg',
            ],
            [
                'id'=> 2,
                'name' =>' GD 925',
                'image'=> '2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'GD 928',
                'image'=> '3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'GD 513',
                'image'=> '4.jpg',
                
            ],
            [
                'id' => 5,
                'name' => 'GD 516',
                'image'=> '5.jpg',
            ],
            [
                'id' => 6,
                'name' => 'GD 525',
                'image'=> '6.jpg',
            ],
            [
                'id' => 7,
                'name' => 'GD 527',
                'image'=> '7.jpg',
            ],
            [
                'id' => 8,
                'name' => 'GD 711',
                'image'=> '8.jpg',
            ],
            [
                'id' => 9,
                'name' => 'GD 712',
                'image'=> '9.jpg',
            ],
            [
                'id' => 10,
                'name' => 'GD 714',
                'image'=> '10.jpg',
            ],
            [
                'id' => 11,
                'name' => 'GD 721',
                'image'=> '11.jpg',
            ],
            [
                'id' => 12,
                'name' => 'GD 723',
                'image'=> '12.jpg',
            ],
            [
                'id' => 13,
                'name' => 'GD 726',
                'image'=> '13.jpg',
            ]
        );
        foreach($data as $d){
            Room::create([
                'id' => $d['id'],
                'name' => $d['name'],
                'image' => $d['image']
            ]);
        }
    }
}
