<?php

use Illuminate\Database\Seeder;
class SinhVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sinhvien')->insert(
        	[
        		[
					'name'       => str_random(10),
					'email'      => str_random(10).'@gmail.com',
					'age'        => 26,
					'phone'      => '0933649647',
					'created_at' => new DateTime()
		        ],
		        [
					'name'       => str_random(10),
					'email'      => str_random(10).'@gmail.com',
					'age'        => 27,
					'phone'      => '0933649648',
					'created_at' => new DateTime()
		        ],
		        [
					'name'       => str_random(10),
					'email'      => str_random(10).'@gmail.com',
					'age'        => 16,
					'phone'      => '0933655647',
					'created_at' => new DateTime()
		        ],
		        [
					'name'       => str_random(10),
					'email'      => str_random(10).'@gmail.com',
					'age'        => 85,
					'phone'      => '0933643698',
					'created_at' => new DateTime()
		        ]
        	]
        );
    }
}
