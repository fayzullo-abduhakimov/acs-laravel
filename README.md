# ACS Conference Platform

A multilingual conference and event management website built with **Laravel 12** and **Filament 4**. It covers the full public-facing experience — event programs, articles, books, archive, venue locations, registrations, and a newsletter — all managed through a Filament admin panel.

---

## Features

### Public Site
- **Event Program** — schedule organised by day with time slots, locations, and tags; AJAX-powered day switching
- **Articles** — news feed with modal article viewer
- **Books** — downloadable/linked resource library
- **Archive** — past editions browsable by year, with archived events and locations
- **Registrations** — multi-field attendee registration form
- **Newsletter** — email subscription
- **Social Links** — configurable social media links in the footer
- **Navigation Menus** — footer menus managed from the admin panel
- **Page Sections** — CMS-style content blocks (hero, partners, gallery headers, etc.)

### Admin Panel (Filament 4)
- **Event Programs** — CRUD for sessions, days, times, tags, locations
- **Articles / Archive News** — content management with publish status and ordering
- **Books** — upload covers and files or set external links
- **Locations** — venue management with image galleries
- **Registrations** — view and manage attendee registrations
- **Subscribers** — newsletter subscriber list
- **Tags** — reusable labels for programs
- **Menus** — navigation item management
- **Sections / Pages** — page section content editing
- **Users** — user account management
- **Site Settings** — arbitrary key-value configuration (phone, email, YouTube link, etc.)
- **Translations** — database-driven UI string overrides

### Admin Plugins
- **Shield** — role and permission management
- **Breezy** — user profile page
- **Logger** — activity log for all admin actions
- **Language Switch** — switch locale from the admin toolbar
- **Translatable Tabs** — per-language tabs on all translatable forms
- **Light Switch** — dark/light mode toggle
- **Auth Designer** — custom login page styling

### Internationalisation
- URL-based locale routing via `mcamara/laravel-localization`
- Model-level translations with `spatie/laravel-translatable`
- Database-driven translation overrides (`SiteTranslations`)
- Helper functions:

```php
settings('seo.title.ru');         // main settings
site_setting('acdf_phone');       // key-value site settings
translator('app', 'Welcome');     // DB translation lookup
```

### Caching
- All settings and translations cached automatically via Redis
- Cache invalidated on save through Eloquent Observers
- Manual rebuild: `php artisan project:cache`

---

## Requirements

- PHP 8.2+
- MySQL / MariaDB
- Node.js (for Vite)
- Redis
- [Docker](https://www.docker.com/) + Docker Compose (recommended)

---

## Installation

### Step 1 — Configure `.env`

```bash
cp .env.example .env
```

Set at minimum:
```env
APP_URL=http://localhost
DB_USERNAME=app
DB_PASSWORD=secret
DB_ROOT_PASSWORD=secret
```

### Step 2 — First run

**Windows:**
```bash
install.bat
```

**Linux / Mac:**
```bash
make install
```

This will:
1. Start Docker containers
2. Install PHP dependencies (`composer install`)
3. Install JS dependencies (`npm install`)
4. Generate `APP_KEY`
5. Run migrations, seeders, and Shield setup
6. Prompt you to create an admin user

### Step 3 — Start Vite (development)

**Windows:**
```bash
dev.bat
```

**Linux / Mac:**
```bash
make dev
```

### Local run (without Docker)

```bash
cp .env.example .env
php artisan key:generate
php artisan project:init
php artisan make:filament-user
composer dev
```

---

## URLs

| Service     | URL                         |
|-------------|-----------------------------|
| Site        | http://localhost            |
| Admin panel | http://localhost/admin      |
| phpMyAdmin  | http://localhost:8080       |
| Mailpit     | http://localhost:8025       |

---

## Artisan Commands

```bash
php artisan project:init      # Fresh install (migrate:fresh + seed + shield)
php artisan project:update    # Incremental update (migrate + shield)
php artisan project:cache     # Rebuild all caches
composer check                # pint + tests + phpstan
```

## Make Commands

```bash
make install      # Full install from scratch
make dev          # Start containers + Vite
make up           # Start containers
make down         # Stop containers
make shell        # Enter app container
make migrate      # Run migrations
make fresh        # migrate:fresh --seed
make test         # Run tests
make cache-clear  # Clear cache
make npm-build    # Build frontend assets
```

---

## Project Structure

```
app/
├── Filament/
│   ├── Resources/
│   │   ├── Articles/           # News articles
│   │   ├── ArchiveNews/        # Past edition archive
│   │   ├── Books/              # Resource library
│   │   ├── EventPrograms/      # Conference sessions
│   │   ├── Locations/          # Venues
│   │   ├── Menus/              # Navigation menus
│   │   ├── Registrations/      # Attendee registrations
│   │   ├── Sections/           # Page content blocks
│   │   ├── SiteSettings/       # Key-value config
│   │   ├── SiteTranslations/   # DB-driven translations
│   │   ├── SocialLinks/        # Social media links
│   │   ├── Tags/               # Program tags
│   │   └── Users/              # User management
│   └── Widgets/
│       └── GreetingWidget.php
├── Http/Controllers/
│   └── HomeController.php      # Single-page site controller
├── Models/                     # Eloquent models
├── Observers/                  # Cache invalidation on model save
└── Helpers/
    └── functions.php           # settings(), site_setting(), translator()
```

---

## Key Dependencies

| Package | Purpose |
|---------|---------|
| filament/filament | Admin panel framework |
| bezhansalleh/filament-shield | Roles & permissions |
| jeffgreco13/filament-breezy | User profile page |
| jacobtims/filament-logger | Admin activity logging |
| spatie/laravel-translatable | Per-model multilingual content |
| mcamara/laravel-localization | URL-based locale routing |
| awcodes/light-switch | Dark/light mode toggle |
| pestphp/pest | Testing framework |
