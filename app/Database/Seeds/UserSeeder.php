<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
      $data = [
        [
          'name'       => 'Arik Agustino',
          'address'    => 'Jl. Merdeka No. 100, Jombang',
          'created_at' => Time::now(),
          'updated_at' => Time::now(),
        ],
        [
          'name'       => 'Caesarik',
          'address'    => 'Jl. Semangka No. 28, Bandung',
          'created_at' => Time::now(),
          'updated_at' => Time::now(),
        ],
        [
          'name'       => 'Kolik Manjiro',
          'address'    => 'Jl. Jeruk No. 77, Yogyakarta',
          'created_at' => Time::now(),
          'updated_at' => Time::now(),
        ],
      ];

      // simple queries
      // $this->db->query(
      //   'INSERT INTO users (name, address, created_at, updated_at) VALUES(:name:, :address:, :created_at:, :updated_at:)', $data
      // );

      // query builder
      // $this->db->table('users')->insert($data);
      $this->db->table('users')->insertBatch($data);
    }
}
