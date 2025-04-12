<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">📰 News Portal System</h1>

<p align="center">
  Laravel • MySQL • Bootstrap • GitHub Actions
</p>

---

## 📝 About the Project

A dynamic online news platform with full CRUD functionality for categories, posts, and polls. Users can browse and filter news by category, interact with posts, and vote in polls. View tracking and engagement are handled smartly for accurate analytics.

---

## 🔑 Authentication

- Login / Register system
- Only registered users can:
  - Like posts
  - Comment on posts
  - Vote in polls

---

## 📰 News & Posts Module

- Each post includes:
  - Title
  - Image
  - Description
  - Category
  - Author
  - Publish date
- Posts belong to categories (e.g. World, Tech, Sports)
- Category filtering available on homepage
- CRUD operations for:
  - Categories
  - Posts
  - Polls

---

## 💬 Reactions & Views

- View count increases only **once per user per post per day**
- Registered users can:
  - 👍 Like a post (only once per post)
  - 💬 Comment on posts
- Post detail pages show total likes, views, and comments

---

## 📊 Polls System

- Admin can create and manage polls
- Registered users can vote (once per poll)
- Real-time poll result display after voting

---

## 🔍 Features & Filters

- Filter posts by category
- Search bar for keywords
- Responsive layout using Bootstrap
- Clean and user-friendly UI

<p float="left">
  <img src="./screenshots/Screenshot 2025-04-13 053756.png" width="48%" />
  <img src="./screenshots/Screenshot 2025-04-13 054706.png" width="48%" />
</p>

---

## ⚙️ Technologies Used

- Laravel
- MySQL
- Bootstrap
- Git / GitHub Actions

---

## 🚀 Getting Started

```bash
git clone https://github.com/your-username/news-portal.git
cd news-portal

composer install

cp .env.example .env
php artisan key:generate

php artisan migrate --seed

php artisan serve
