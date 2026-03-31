[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/yFz87lZK)
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Project Setup Guide (For Students)

Follow these steps to clone and run the project locally. You are encouraged to explore and modify the code freely.


### 1. Install Dependencies

Install PHP and JavaScript dependencies:

```bash
composer install
npm install
```

### 2. Setup Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

Then open `.env` and configure your database and other settings if needed.

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Run Migrations (if applicable)

```bash
php artisan migrate
```

### 5. Build Frontend Assets

```bash
npm run dev
```

### 6. Run the Application

```bash
php artisan serve
```

Open your browser and go to:

```
http://127.0.0.1:8000
```

---

## Activity 1: Simple Navigation

Your task is to build a very simple navigation system using Laravel.

### Objective

Create a navbar with three links:

* Home
* About
* Contact
* Services
* Showcases
* Blog

Each link should display a simple message when clicked.

### Expected Output

* Home → "Welcome to homepage"
* About → "About us section"
* Contact → "Contact page"
* Services → "Services page"
* Showcases → "Showcases page"
* Blog → "Blog page"

### Steps

1. Create a navbar component inside:

```
resources/views/components/navbar.blade.php
```

Add:

```blade
<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/contact">Contact</a> |
    <a href="/services">Services</a> |
    <a href="/showcases">Showcases</a> |
    <a href="/blog">Blog</a> 
</nav>
<hr>
```

2. Use the navbar in your layout:

```blade
<x-navbar />
{{ $slot }}
```

3. Make sure your routes are defined in `routes/web.php`:

```php
Route::get('/', function () {
    return view('welcome');
}); or Route::view('/', 'welcome');

##both routes above works but view works only for static webpages.

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


...
```

4. Update each page:

**welcome.blade.php**

```blade
<x-layout>
    <h1>Welcome to homepage</h1>
</x-layout>
```

**about.blade.php**

```blade
<x-layout>
    <h1>About us section</h1>
</x-layout>
```

**contact.blade.php**

```blade
<x-layout>
    <h1>Contact page</h1>
</x-layout>
```

```
...
```
---

## Notes for Students

* Feel free to modify the code and experiment.
* Breaking things is part of learning—don’t be afraid to try.
* If something stops working, you can always re-clone the project.
* Make sure your database is properly configured in `.env`.

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. It simplifies common tasks like routing, authentication, and database management.

For full documentation, visit: [https://laravel.com/docs](https://laravel.com/docs)

---

## License

This project follows the MIT license.
