<p align="center">
  <svg width="400" height="150" viewBox="0 0 400 120" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="globeGradient" x1="0%" y1="0%" x2="14%" y2="100%">
        <stop offset="0%" style="stop-color:#42A5F9;stop-opacity:1" />
        <stop offset="100%" style="stop-color:#0D47A1;stop-opacity:1" />
      </linearGradient>
    </defs>
    <circle cx="60" cy="60" r="40" fill="url(#globeGradient)" stroke="#0D47A1" stroke-width="2"/>
    <path d="M60 20 C80 25, 100 25, 120 20 M60 100 C80 95, 100 95, 120 100" stroke="white" stroke-width="1.5" fill="none" opacity="0.8"/>
    <ellipse cx="60" cy="60" rx="25" ry="40" fill="none" stroke="white" stroke-width="1.5" opacity="0.8" transform="rotate(-30 60 60)"/>
    <text x="150" y="70" font-family="'Segoe UI', Tahoma, sans-serif" font-size="34" font-weight="bold" fill="url(#globeGradient)">WEBSITE</text>
  </svg>
</p>

<h2 align="center">🌐 Laravel Website Project</h2>

<p align="center">
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php"></a>
  <a href="https://www.mysql.com/"><img src="https://img.shields.io/badge/MySQL-Database-yellow?style=for-the-badge&logo=mysql"></a>
</p>

---

## 📖 About Website

This project is a **modern web application** built with **Laravel Framework**.  
It is designed to be **scalable, secure, and easy to customize** for different business needs.  
The goal of this project is to provide a solid boilerplate for developing professional websites.

---

## ✨ Features

- ✅ Authentication (Login & Register)  
- ✅ User Profile Management  
- ✅ CRUD (Create, Read, Update, Delete) Modules  
- ✅ Responsive Design with Bootstrap / TailwindCSS  
- ✅ SweetAlert Notifications (Success/Error)  
- ✅ RESTful API Ready  
- ✅ Well-structured MVC Architecture  

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11  
- **Language**: PHP 8.2  
- **Database**: MySQL / MariaDB  
- **Frontend**: Blade, Bootstrap 5, TailwindCSS  
- **Auth**: Laravel Breeze / Jetstream (optional)  
- **Alert**: SweetAlert2  

---

## ⚡ Installation

```bash
git clone https://github.com/your-username/website.git
cd website

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate

php artisan migrate --seed

php artisan serve

http://localhost:8000


