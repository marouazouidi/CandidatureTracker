# Candidature Tracker

A Laravel web application to track and manage job applications, interviews, and offers in one place.

## Features

- **Dashboard** — Overview stats (active applications, upcoming interviews, offers received, rejected)
- **Candidatures** — Full CRUD with archive/restore, search, filter by status/priority, sort by multiple fields
- **Interviews** — Full CRUD per candidature (Telephone, Technique, RH, Final)
- **Statuses** — To Review, Interview Scheduled, Offer Received, Rejected, Abandoned
- **Priorities** — Low, Medium, High
- **Authentication** — Register, Login, Password reset, Email verification (Laravel Breeze)
- **Profile** — Edit name/email, update password, delete account
- **Responsive** — Sidebar navigation with mobile toggle

## Tech Stack

| Technology | Version |
|---|---|
| Laravel | ^13.8 |
| PHP | ^8.3 |
| Tailwind CSS | ^3.1 |
| Alpine.js | ^3.4 |
| Vite | ^8.0 |
| Database | SQLite / MySQL |

## Requirements

- PHP ^8.3
- Composer
- Node.js & npm
- SQLite or MySQL

## Installation

```bash
git clone <repo-url> candidature-tracker
cd candidature-tracker
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Visit http://localhost:8000 in your browser.

## Screenshots

> *(Add screenshots here)*

## Project Structure

```
app/
├── Http/
│   ├── Controllers/     # CandidatureController, InterviewController, ProfileController
│   ├── Requests/        # Form request validation classes
│   └── ...
├── Models/              # User, Candidature, Interview
├── Policies/            # Authorization policies
├── Providers/           # AppServiceProvider (dashboard view composer)
└── View/Components/     # AppLayout, GuestLayout
database/
├── factories/           # Model factories for testing
├── migrations/          # Database migrations
└── seeders/             # Database seeders
resources/
├── css/                 # Tailwind CSS
├── js/                  # Alpine.js, Axios
└── views/               # Blade templates (layouts, candidatures, interviews, auth, profile)
routes/
├── web.php              # Web routes
└── auth.php             # Authentication routes
```

## Routes

### Candidatures

| Method | URI | Action |
|---|---|---|
| GET | /candidatures | List active |
| GET | /candidatures/create | Create form |
| POST | /candidatures | Store |
| GET | /candidatures/{id} | Show detail |
| GET | /candidatures/{id}/edit | Edit form |
| PUT | /candidatures/{id} | Update |
| DELETE | /candidatures/{id} | Archive |
| PATCH | /candidatures/{id}/restore | Restore |
| DELETE | /candidatures/{id}/force | Force delete |
| GET | /candidatures/archives | List archived |

### Interviews

| Method | URI | Action |
|---|---|---|
| GET | /candidatures/{id}/interviews | List |
| GET | /candidatures/{id}/interviews/create | Create form |
| POST | /candidatures/{id}/interviews | Store |
| GET | /candidatures/{id}/interviews/{id} | Show |
| GET | /candidatures/{id}/interviews/{id}/edit | Edit form |
| PUT | /candidatures/{id}/interviews/{id} | Update |
| DELETE | /candidatures/{id}/interviews/{id} | Delete |

### Auth & Profile

Standard Laravel Breeze routes for login, register, password reset, email verification, and profile management.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).