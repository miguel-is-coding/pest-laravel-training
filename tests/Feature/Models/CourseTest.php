<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('only returns released courses for released scope', function () {
    Course::factory()->released()->create();
    Course::factory()->create();

    expect(Course::released()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});

it('has videos', function () {
    $course = Course::factory()->create();
    \App\Models\Video::factory()->count(3)->create(['course_id' => $course->id]);

    expect($course->videos)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(\App\Models\Video::class);
});
