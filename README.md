# laravel-cicd-demo

A tiny Laravel 13 notes API used in the "CI/CD for Laravel 13 with GitHub Actions" course on the Code with SJM channel.
It exists only to show real GitHub Actions runs: Pest tests, Pint, Larastan and a PHP version matrix.

- `GET /api/notes`, `POST /api/notes`, `GET /api/notes/{id}`
- Tests: `vendor/bin/pest` · Style: `vendor/bin/pint --test` · Static analysis: `vendor/bin/phpstan analyse`

This is a throwaway demo repository. Nothing here is deployed anywhere.
