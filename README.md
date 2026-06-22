# Foodie Taste Better

## Project Overview

Foodie Taste Better is a Laravel-based food ordering web application. I developed this project to manage food products, categories, carts, checkout, delivery details, and customer orders in one system.

The system has two main parts: a customer side and an admin side. Customers can view food items, add products to cart, save delivery information, and place orders. Admin can manage categories, products, and customer orders from the admin panel.

<img width="938" height="446" alt="Screenshot 2026-06-23 005151" src="https://github.com/user-attachments/assets/588f5425-cc09-4453-8bff-3e657daabfd5" />


## Main Features

### Customer Features

* User signup and login
* View food products by category
* View product image, price, discount price, and description
* Add products to cart
* Increase and decrease cart product quantity
* Checkout with delivery details
* Add phone number and delivery place
* Select saved delivery address
* View order summary before placing order
* Place order successfully

### Admin Features

* Admin login
* Manage food categories
* Insert new products
* View all products
* Edit product details
* Update product price and discount price
* Update product category
* View carts and placed orders
* View customer name, email, phone number, delivery place, and ordered products

---

## Technologies Used

* Laravel
* PHP
* MySQL
* XAMPP
* Blade Template Engine
* Bootstrap
* HTML
* CSS

---

## Database

I used MySQL database for this project. The database stores:

* Users
* Admin
* Categories
* Products
* Orders
* Order items
* Delivery addresses

---

## Project Setup

### Requirements

Before running this project, these tools need to be installed:

* XAMPP
* PHP 8.1 or higher
* Composer
* MySQL

---

## Installation Steps

### 1. Clone or Download the Project

Place the project folder inside:

```bash
C:\xampp\htdocs
```

Example:

```bash
C:\xampp\htdocs\LaravelProject_foodie-master\LaravelProject_foodie-master
```

---

### 2. Open the Project Folder

Open the project folder in VS Code.

Then open terminal and go to the project folder:

```bash
cd C:\xampp\htdocs\LaravelProject_foodie-master\LaravelProject_foodie-master
```

---

### 3. Install Composer Dependencies

```bash
composer install
```

---

### 4. Create `.env` File

```bash
copy .env.example .env
```

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

### 6. Create Database

Open phpMyAdmin:

```bash
http://localhost/phpmyadmin
```

Create a database named:

```bash
foodie
```

---

### 7. Update Database Information in `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=foodie
DB_USERNAME=root
DB_PASSWORD=
```

---

### 8. Run Migration

```bash
php artisan migrate
```

---

### 9. Run Admin Seeder

```bash
php artisan db:seed --class=AdminSeeder
```

---

### 10. Create Storage Link

```bash
php artisan storage:link
```

---

### 11. Run the Project

```bash
php artisan serve
```

Open the project in browser:

```bash
http://127.0.0.1:8000
```

---

## Admin Login

Admin panel URL:

```bash
http://127.0.0.1:8000/admin/admin/login
```

Admin credentials:

```bash
Email: admin@gmail.com
Password: 123456789
```

---

## Customer Flow

1. Create a customer account
2. Login as customer
3. Browse food products
4. Add products to cart
5. Go to cart page
6. Proceed to checkout
7. Fill phone number and delivery place
8. Save delivery address
9. Select saved delivery address
10. Place order

---

## Admin Flow

1. Login as admin
2. Create food categories
3. Insert products with image, price, discount price, description, and category
4. Manage products
5. Edit wrong product price or category
6. View customer carts and placed orders
7. Check customer phone number and delivery place

---

## Screenshots

### Home Page

<img width="938" height="446" alt="Screenshot 2026-06-23 005151" src="https://github.com/user-attachments/assets/a2500ff8-ff28-4473-a9f9-62e01ebebd1c" />

 ##User Register & Login
 <img width="959" height="415" alt="Screenshot 2026-06-23 005135" src="https://github.com/user-attachments/assets/4674fb5b-fb4b-45f7-bcca-14896e31fee0" />
<img width="959" height="416" alt="Screenshot 2026-06-23 005143" src="https://github.com/user-attachments/assets/653cadc1-44a1-4f7e-8527-0aa28b37c661" />

 

### Cart Page
<img width="959" height="380" alt="Screenshot 2026-06-23 005412" src="https://github.com/user-attachments/assets/7327684f-2bad-44c4-a4bb-a436454ffbb1" />
<img width="953" height="409" alt="Screenshot 2026-06-23 005241" src="https://github.com/user-attachments/assets/19a254db-9b95-4e9a-9bb5-0c249c42cf36" />


### Checkout Page
<img width="947" height="395" alt="Screenshot 2026-06-23 005450" src="https://github.com/user-attachments/assets/14a5918b-d69d-426a-8d13-c401421cc048" />
<img width="930" height="352" alt="Screenshot 2026-06-23 005455" src="https://github.com/user-attachments/assets/1f45c878-8222-422d-8b58-8bf8149d2607" />


### Admin Login Page
<img width="952" height="397" alt="Screenshot 2026-06-23 004949" src="https://github.com/user-attachments/assets/46eb88d0-cca6-47ad-b1df-b7c9c08dbe27" />


<img width="932" height="400" alt="Screenshot 2026-06-23 005012" src="https://github.com/user-attachments/assets/39f536ce-e0d4-4e10-b29e-c73d3ab7efa9" />

### Admin Manage Orders Page

<img width="959" height="404" alt="Screenshot 2026-06-23 005023" src="https://github.com/user-attachments/assets/6c2b2a0e-991e-4deb-80a6-16bc1fbb5078" />
<img width="713" height="313" alt="Screenshot 2026-06-23 005031" src="https://github.com/user-attachments/assets/78cb5284-69dd-4f80-99cb-fbbb8599999f" />


### Admin Manage Products Page

<img width="953" height="409" alt="Screenshot 2026-06-23 005105" src="https://github.com/user-attachments/assets/7d9bcb14-8895-45f1-8657-141fa485fb76" />
<img width="943" height="404" alt="Screenshot 2026-06-23 005053" src="https://github.com/user-attachments/assets/ee7edd93-c052-4f15-ba8f-0d2545be5ebc" />


### Admin Manage Orders Page
<img width="937" height="404" alt="Screenshot 2026-06-23 005041" src="https://github.com/user-attachments/assets/e1add9bb-04fe-4dba-a17f-bfd101904afb" />




## Important Notes

* The project should be run using `php artisan serve`.
* MySQL must be running from XAMPP.
* The `.env` file must contain the correct database name.
* Product images are stored using Laravel storage.
* `php artisan storage:link` is needed to show uploaded images properly.

---


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Conclusion

I built this Laravel food ordering system to practice real-world web application development. Through this project, I implemented user authentication, product management, cart system, checkout system, delivery address system, and admin order management.

## Author
Sanzida Moin Tithi
