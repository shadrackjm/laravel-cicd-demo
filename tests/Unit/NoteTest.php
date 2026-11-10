<?php

use App\Models\Note;

it('trims the title', function () {
    $note = new Note(['title' => '  Plan  ']);

    expect($note->title)->toBe('Plan');
});
