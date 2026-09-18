# Hotel Management System

A full-stack hotel management application with a Laravel backend and an Angular frontend.

## Project Structure

- `Laravel/` — Backend API, web routes, and admin panel (Voyager)
- `Angular/` — Frontend client for customer registration, room lookup, and reservations

## Features

- Customer sign-up and lookup
- Room availability search by check-in/check-out dates
- Reservation creation and reservation status checks
- Laravel admin area (`/admin`) for backend management

## Tech Stack

- **Backend:** Laravel 9, PHP 8, MySQL
- **Frontend:** Angular 8, TypeScript
- **Admin:** TCG Voyager

## Prerequisites

- PHP 8+
- Composer
- Node.js + npm
- MySQL

## Backend Setup (Laravel)

1. Go to backend folder:
   - `cd /home/runner/work/Hotel-Management-System/Hotel-Management-System/Laravel`
2. Install PHP dependencies:
   - `composer install`
3. Copy environment file:
   - `cp .env.example .env`
4. Configure your MySQL credentials in `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)
5. Generate app key:
   - `php artisan key:generate`
6. Run migrations:
   - `php artisan migrate`
7. Start backend server:
   - `php artisan serve`

Backend runs on: `http://localhost:8000`

## Frontend Setup (Angular)

1. Open a new terminal and go to frontend folder:
   - `cd /home/runner/work/Hotel-Management-System/Hotel-Management-System/Angular`
2. Install dependencies:
   - `npm install`
3. Start Angular dev server:
   - `npm start`

Frontend runs on: `http://localhost:4200`

> The frontend is currently configured to call the backend at `http://localhost:8000/api/`.
## Main Routes

### Frontend

- `/` — Home
- `/register` — Email check / login step
- `/sign-up` — Customer sign-up
- `/available` — Find available rooms
- `/reservation` — Create reservation
- `/check` — Check reservation details

### Backend API

- `POST /api/save-customer`
- `POST /api/check-email`
- `POST /api/check-email-signup`
- `POST /api/check-name`
- `POST /api/check-phone`
- `POST /api/check-address`
- `POST /api/select-name`
- `POST /api/rooms-available`
- `POST /api/check-reservation`
- `POST /api/save-reservation`

## Useful Commands

### Laravel

- Run tests: `php artisan test`

### Angular

- Build: `npm run build`
- Unit tests: `npm test`
- Lint: `npm run lint`
