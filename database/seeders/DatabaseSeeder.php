<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    DB::table('roles')->insertOrIgnore([
      [
        'id'         => 1,
        'name'       => 'Publik',
        'guard_name' => 'web',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'id'         => 2,
        'name'       => 'Super Admin',
        'guard_name' => 'web',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'id'         => 3,
        'name'       => 'Admin',
        'guard_name' => 'web',
        'created_at' => now(),
        'updated_at' => now()
      ],
    ]);

    DB::table('users')->insertOrIgnore([
      [
        'id'                => 1,
        'name'              => 'Super Admin',
        'email'             => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password'          => '$2y$10$7v9mH4qcAh4aDZQOBhUM2eQiVCNTyVeeRNwwZw4WVWoj1BM1CqhxS',
        'created_at'        => now(),
        'updated_at'        => now()
      ],
      [
        'id'                => 2,
        'name'              => 'Admin',
        'email'             => 'admin2@gmail.com',
        'email_verified_at' => now(),
        'password'          => '$2y$10$7v9mH4qcAh4aDZQOBhUM2eQiVCNTyVeeRNwwZw4WVWoj1BM1CqhxS',
        'created_at'        => now(),
        'updated_at'        => now()
      ],
      [
        'id'                => 3,
        'name'              => 'Publik',
        'email'             => 'publik@gmail.com',
        'email_verified_at' => now(),
        'password'          => '$2y$10$WZcu3jMB3QHkJZRHkI5yz.MGm.S4xutg.33HbIQodOouhypxiWP2K',
        'created_at'        => now(),
        'updated_at'        => now()
      ]
    ]);

    DB::table('model_has_roles')->insertOrIgnore([
      [
        'model_id'   => 1,
        'model_type' => 'App\Models\User',
        'role_id'    => 3
      ],
      [
        'model_id'   => 2,
        'model_type' => 'App\Models\User',
        'role_id'    => 2
      ],
      [
        'model_id'   => 3,
        'model_type' => 'App\Models\User',
        'role_id'    => 1
      ]
    ]);

    DB::table('guru')->insertOrIgnore([
      [
        'id'         => 1,
        'nip'        => 123,
        'nama'       => 'Guru1',
        'jk'         => 'Laki-laki',
        'alamat'     => 'Riau',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'id'         => 2,
        'nip'        => 234,
        'nama'       => 'Guru2',
        'jk'         => 'Laki-laki',
        'alamat'     => 'Riau',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'id'         => 3,
        'nip'        => 345,
        'nama'       => 'Guru3',
        'jk'         => 'Laki-laki',
        'alamat'     => 'Riau',
        'created_at' => now(),
        'updated_at' => now()
      ]
    ]);

    DB::table('kurikulum')->insertOrIgnore([
      [
        'kd_kurikulum' => 22001,
        'semester'     => 1,
        'tahun'        => 2022,
        'created_at'   => now(),
        'updated_at'   => now()
      ]
    ]);

    DB::table('pelajaran')->insertOrIgnore([
      [
        'kd_mapel'   => 'MP001',
        'mapel'      => 'Matematika',
        'status'     => true,
        'id_guru'    => 1,
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'kd_mapel'   => 'MP002',
        'mapel'      => 'IPA',
        'status'     => true,
        'id_guru'    => 2,
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'kd_mapel'   => 'MP003',
        'mapel'      => 'IPS',
        'status'     => true,
        'id_guru'    => 3,
        'created_at' => now(),
        'updated_at' => now()
      ]
    ]);

    DB::table('jadwal')->insertOrIgnore([
      [
        'kd_jadwal'    => 'JD001',
        'id_kurikulum' => 1,
        'jadwal'       => '{"senin":"IPS","selasa":"","rabu":"Matematika","kamis":"IPA","jumat":"","sabtu":""}}',
        'created_at'   => now(),
        'updated_at'   => now()
      ]
    ]);
  }
}
