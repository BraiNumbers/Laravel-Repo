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
            'author_id' => '1',
            'name' => 'Seeder project',
            'intro' => 'De seeder intro',
            'description' => 'De seeder omschrijving',
            'project_image' => 'https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg',
            'start_date' => Carbon::create('2021', '11', '15'),
            'end_date' => Carbon::create('2022', '11', '15')
        ]);
        $project->users()->attach(1);
    }
}
