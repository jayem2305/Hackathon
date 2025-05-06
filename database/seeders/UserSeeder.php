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
            'first_name' => 'jayem',
            'last_name' => 'Enrique',
            'middle_name' => 'alacapa',
            'phone_number' => '+63-999-872-6506',
            'address' => '123 street amazon city',
            'profile_image' => '2v2.jpg',
            'role' => 'admin',
            'email' => 'jenrique.a12138658@umak.edu.ph',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('Admin123'), // Assuming the password is 'password123'
            'otp' => '123456',
            'otp_expires_at' => Carbon::now()->addMinutes(15),
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
