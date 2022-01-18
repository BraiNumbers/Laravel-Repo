<?php

use Illuminate\Database\Seeder;
use App\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::Create([
            'id' => '1',
            'name' => 'Seeder project',
            'intro' => 'De seeder intro',
            'description' => 'De seeder omschrijving',
            'project_image' => 'https://www.elementar.com/fileadmin/_processed_/e/6/csm_ex-seeding-expectations-banner-image_f0baee9d5b.jpg',
            'start_date' => Carbon::create('2021', '11', '15'),
            'end_date' => Carbon::create('2022', '11', '15')
        ]);
        $project->users()->attach(1);
    }
}
