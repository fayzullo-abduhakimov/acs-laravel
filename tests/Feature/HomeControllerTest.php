<?php

use App\Models\Article;
use App\Models\Registration;
use App\Models\Subscriber;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;

// ---------------------------------------------------------------------------
// Home page
// ---------------------------------------------------------------------------

test('home page loads successfully', function () {
    $this->withoutMiddleware([LocaleSessionRedirect::class, LaravelLocalizationRedirectFilter::class, LaravelLocalizationViewPath::class])
        ->get('/')
        ->assertOk();
});

// ---------------------------------------------------------------------------
// Registration
// ---------------------------------------------------------------------------

test('user can submit a valid registration', function () {
    $this->post('/register', [
        'first_name' => 'John',
        'last_name'  => 'Doe',
        'email'      => 'john@example.com',
        'phone'      => '+1234567890',
        'address'    => '123 Main St',
        'city'       => 'New York',
    ])->assertRedirect();

    expect(Registration::where('email', 'john@example.com')->exists())->toBeTrue();
});

test('registration requires all mandatory fields', function () {
    $this->post('/register', [])
        ->assertSessionHasErrors(['first_name', 'last_name', 'email', 'phone', 'address', 'city'], null, 'registration');
});

test('registration rejects duplicate email', function () {
    Registration::factory()->create(['email' => 'taken@example.com']);

    $this->post('/register', [
        'first_name' => 'Jane',
        'last_name'  => 'Doe',
        'email'      => 'taken@example.com',
        'phone'      => '+1234567890',
        'address'    => '123 Main St',
        'city'       => 'New York',
    ])->assertSessionHasErrors(['email'], null, 'registration');

    expect(Registration::count())->toBe(1);
});

test('registration stores array fields correctly', function () {
    $this->post('/register', [
        'first_name'      => 'Alice',
        'last_name'       => 'Smith',
        'email'           => 'alice@example.com',
        'phone'           => '+1234567890',
        'address'         => '456 Oak Ave',
        'city'            => 'Boston',
        'sources'         => ['website', 'friend'],
        'attendance_days' => ['day1', 'day2'],
    ]);

    $registration = Registration::where('email', 'alice@example.com')->first();
    expect($registration->sources)->toBe(['website', 'friend'])
        ->and($registration->attendance_days)->toBe(['day1', 'day2']);
});

// ---------------------------------------------------------------------------
// Subscribe
// ---------------------------------------------------------------------------

test('user can subscribe with a valid email', function () {
    $this->post('/subscribe', ['email' => 'news@example.com'])->assertRedirect();

    expect(Subscriber::where('email', 'news@example.com')->exists())->toBeTrue();
});

test('subscribe requires a valid email address', function () {
    $this->post('/subscribe', ['email' => 'not-an-email'])
        ->assertSessionHasErrors(['email']);
});

test('subscribe rejects duplicate email', function () {
    Subscriber::factory()->create(['email' => 'already@example.com']);

    $this->post('/subscribe', ['email' => 'already@example.com'])
        ->assertSessionHasErrors(['email']);

    expect(Subscriber::count())->toBe(1);
});

// ---------------------------------------------------------------------------
// Get programs (AJAX)
// ---------------------------------------------------------------------------

test('get programs returns error when day is missing', function () {
    $this->postJson('/get-programs')
        ->assertJson(['success' => false]);
});

test('get programs returns programs array for a given day', function () {
    $this->postJson('/get-programs', ['day' => '2026-05-20'])
        ->assertJson(['success' => true])
        ->assertJsonStructure(['success', 'programs']);
});

// ---------------------------------------------------------------------------
// Get article (AJAX)
// ---------------------------------------------------------------------------

test('get article returns not found for a missing id', function () {
    $this->postJson('/get-article', ['id' => 99999])
        ->assertJson(['success' => false]);
});

test('get article returns article data for a published article', function () {
    $article = Article::factory()->create(['status' => 1]);

    $this->postJson('/get-article', ['id' => $article->id])
        ->assertJson(['success' => true])
        ->assertJsonStructure(['success', 'article' => ['id', 'translations']]);
});

test('get article does not return unpublished articles', function () {
    $article = Article::factory()->create(['status' => 0]);

    $this->postJson('/get-article', ['id' => $article->id])
        ->assertJson(['success' => false]);
});

// ---------------------------------------------------------------------------
// Archive year (AJAX)
// ---------------------------------------------------------------------------

test('archive year returns error when year is missing', function () {
    $this->postJson('/archive-year')
        ->assertJson(['success' => false]);
});

test('archive year returns html for a given year', function () {
    $this->postJson('/archive-year', ['year' => '2025'])
        ->assertJson(['success' => true])
        ->assertJsonStructure(['success', 'html']);
});
