<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
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

# Weather
Simple weather application to show the current weather in a given location.
References:
- Open Weather JSON Map API [https://openweathermap.org/](https://openweathermap.org/API)
- REST Countries API [https://restcountries.eu/](https://restcountries.eu/)

[Online Testing server](https://weather.sophie-ware.fun/)

## Application Info
**Framework:** Laravel 6 + VueJs

**Operation System:** Debian 10 | Apache 2.4.38 | PHP 7.3.12

**Dependencies:** Laravel 6 Dependencies, NodeJS

## General Deployment Instructions
1. Clone the repository:
    ```sh
        $ git clone https://github.com/rmendoza83/weather-vue.git weather-vue
    ```

2. Move to the new cloned folder:
    ```sh
        $ cd weather-vue
    ```

3. Prepare the VueJS frontend code:
    ```sh
        $ npm install
        $ npm run prod
    ```

4. Prepare the Lavarel code:
    ```sh
        $ composer install
        $ cp .env.example .env
    ```

5. Configure Laravel Framework to get up the app (Create the Key App)
    ```sh
        $ php artisan key:generate
    ```
6. Done. Just navigate to the configurated folder on Apache using a Navigator.

## Contact
* Reinaldo Mendoza - rmendoza83@gmail.com