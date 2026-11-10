<?php

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists notes', function () {
    Note::factory()->count(3)->create();

    $this->getJson('/api/notes')
        ->assertOk()
        ->assertJsonCount(3);
});

it('creates a note', function () {
    $this->postJson('/api/notes', ['title' => 'Plan the week', 'body' => 'Tests first'])
        ->assertCreated()
        ->assertJsonPath('title', 'Plan the week');

    expect(Note::count())->toBe(1);
});

it('requires a title', function () {
    $this->postJson('/api/notes', ['body' => 'No title'])
        ->assertUnprocessable()
        ->assertJsonValidationErrors('title');
});

it('shows one note', function () {
    $note = Note::factory()->create();

    $this->getJson("/api/notes/{$note->id}")
        ->assertOk()
        ->assertJsonPath('id', $note->id);
});

it('returns 404 for a missing note', function () {
    $this->getJson('/api/notes/999')->assertNotFound();
});
