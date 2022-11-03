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
  }
}
