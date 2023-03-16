<?php

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('show course details', function () {
    $course = \App\Models\Course::factory()->create([
       'tagline' => 'Course tagline',
       'image' => 'image.png',
       'learnings' => [
            'Learn Laravel routes',
            'Learn Laravel views',
            'Learn Laravel commands',
       ]
    ]);

    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->description,
            'Course tagline',
            'Learn Laravel routes',
            'Learn Laravel views',
            'Learn Laravel commands',
        ])
        ->assertSee('image.png');
});

it('show course video count', function () {
    $course = \App\Models\Course::factory()->create();
    Video::factory()->count(3)->create(['course_id' => $course->id]);

    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText('3 videos');
});
