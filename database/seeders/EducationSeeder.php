<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
          [ 'title'=>'S.S.C',
            'sector'=>'Govt. Laboratory High School,Khulna',
            'description'=>'Systech Digital Limited is a CMMI level 3, ISO 27001:2013, and ISO 9001:2015 certified leading software product and services company in Bangladesh.',
            'time'=>2016 ],
          [ 'title'=>'H.S.C',
            'sector'=>'Khulna Model college,Khulna',
            'description'=>'Systech Digital Limited is a CMMI level 3, ISO 27001:2013, and ISO 9001:2015 certified leading software product and services company in Bangladesh.',
            'time'=>2016 ],
          [ 'title'=>'B.Sc in CSE',
            'sector'=>'Uttara University,Uttara',
            'description'=>'Systech Digital Limited is a CMMI level 3, ISO 27001:2013, and ISO 9001:2015 certified leading software product and services company in Bangladesh.',
            'time'=>2016 ],
        ];

        foreach($educations as $education){
         Education::create($education);

        }
        
    }
}
