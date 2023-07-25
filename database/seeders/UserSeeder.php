<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name'=>'Sajid Rayhan',
            'image' => 'uploads/imageSeed/sr3.jpg',
            'email'=>'sajidrayhan875@gmail.com',
            'description'=> 'I am a laravel developer with a Bachelors  degree in Computer Science & Engineering & hands on experience with following areas php Framework(Laravel),Javascript,Ajax,Bootstrap,jQuery,Css etc',
            'phone'=>'01329497106',
            'designation'=>'Laravel Developer',
            'address'=>'Sector-6,Uttara,Dhaka',
            'age'=>'24',
            'nationality'=>'Bangladeshi',
            'freelance'=>'No',
            'complete_project'=>'3',
            'languages'=>'Bangla,English',
            // 'cv_download'=>'uploads/cv/sr3.jpg',
            'email_verified_at'=> now(),
            'password'=> bcrypt(123456)

           ];
           User::create($user);
    }
}
