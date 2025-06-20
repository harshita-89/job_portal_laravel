# Laravel Job Portal

A simple and functional Job Portal application built with Laravel. This project allows companies to post job listings and users to browse and apply for jobs.

## 🔧 Features

- Job listing CRUD
- Categories and job types
- MySQL database integration
- Seeders & Factories for dummy data
- Responsive frontend
- Authentication

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.1  
- Composer  
- MySQL  
- Laravel >= 10  
- Node.js (optional, for frontend scaffolding)

### Installation

```bash
git clone https://github.com/your-username/job_portal.git
cd job_portal
composer install
cp .env.example .env
php artisan key:generate


## Configure Environment
#Edit .env and update:

DB_DATABASE=job_portal
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

## Then run migrations and seeders:
php artisan migrate --seed

## Run the Development Server
php artisan serve
Visit http://127.0.0.1:8000

##📦 Seeder & Factory Info
Dummy records are created using Laravel factories:

\App\Models\Category::factory(5)->create();
\App\Models\JobType::factory(5)->create();

You can customize them in:
database/factories/
database/seeders/

#php artisan test
📜 License
This project is open-sourced under the MIT License.

# 🤝 Contributing
Pull requests are welcome. For major changes, open an issue first to discuss what you’d like to change.
