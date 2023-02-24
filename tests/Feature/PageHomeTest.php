<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('shows courses overview', function () {
    Course::factory()->create(['title' => 'Course A']);
    Course::factory()->create(['title' => 'Course B']);
    Course::factory()->create(['title' => 'Course C']);

    get(route('home'))
        ->assertSeeText([
            'Course A',
            'Course B',
        ]);
});

it('shows only released courses', function () {

});

it('show courses by release date', function () {

});
