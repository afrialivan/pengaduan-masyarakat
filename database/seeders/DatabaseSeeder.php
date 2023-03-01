<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void\
     */
    public function run()
    {
        Pengaduan::factory(5)->create();

        User::create([
            'nik' => '8471828394819475',
            'nama' => 'A. Muh. Afrial Ivan Pratama',
            'username' => 'prall',
            'password' => bcrypt('111'),
            'tlp' => '089837162568',
        ]);
        User::create([
            'nik' => '8471828394111947',
            'nama' => 'Udin',
            'username' => 'udin',
            'password' => bcrypt('111'),
            'tlp' => '089831162568',
        ]);
        User::create([
            'nik' => '847182839488947',
            'nama' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('111'),
            'tlp' => '089837111568',
            'level' => 'admin',
        ]);
        User::create([
            'nik' => '847182839481557',
            'nama' => 'petugas',
            'username' => 'petugas',
            'password' => bcrypt('111'),
            'tlp' => '089837162668',
            'level' => 'petugas',
        ]);
    }
}
