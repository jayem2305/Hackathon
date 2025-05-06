<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'jenrique.a12138658@umak.edu.ph',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password123'), // Assuming the password is 'password123'
            'otp' => '123456',
            'otp_expires_at' => Carbon::now()->addMinutes(15),
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
