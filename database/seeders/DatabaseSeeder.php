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

    User::create([
      'id'                => 1,
      'name'              => 'Galeh Ludi',
      'email'             => 'galehludi@outlook.co.id',
      'email_verified_at' => now(),
      'password'          => '$2y$10$Uy0Fbem0frcrX28p.0ChE.EkootBX74n8.E/CPa22UrI/wKrswyh.',
      'created_at'        => now(),
      'updated_at'        => now()
    ]);



    // DB::table('model_has_roles')->insertOrIgnore(['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 1]);
  }
}
