# Laravel CMS

<a href="https://packagist.org/packages/syedhamidalishahofficial/cms"><img src="https://img.shields.io/packagist/dt/hamid/ui" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/syedhamidalishahofficial/cms"><img src="https://img.shields.io/packagist/v/hamid/ui" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/syedhamidalishahofficial/cms"><img src="https://img.shields.io/packagist/l/hamid/ui" alt="License"></a>

## Introduction

While Laravel does not dictate which JavaScript or CSS pre-processors you use, it does provide a basic starting point using [Bootstrap](https://getbootstrap.com/), [React](https://reactjs.org/), and / or [Vue](https://vuejs.org/) that will be helpful for many applications. By default, Laravel uses [NPM](https://www.npmjs.org/) to install both of these frontend packages.

> This legacy package is a very simple authentication scaffolding built on the Bootstrap CSS framework. While it continues to work with the latest version of Laravel, you should consider using [Laravel Breeze](https://github.com/laravel/breeze) for new projects. Or, for something more robust, consider [Laravel Jetstream](https://github.com/laravel/jetstream).

## Official Documentation

### Supported Versions

Only the latest major version of Laravel CMS receives bug fixes. The table below lists compatible Laravel versions:

| Version | Laravel Version |
|---- |----|
| [1.x](https://github.com/syedhamidalishahofficial/cms/tree/1.x) | 5.8, 6.x |
| [2.x](https://github.com/syedhamidalishahofficial/cms/tree/2.x) | 7.x |
| [3.x](https://github.com/syedhamidalishahofficial/cms/tree/3.x) | 8.x, 9.x |

### Installation

The Bootstrap and Vue scaffolding provided by Laravel is located in the `hamid/cms` Composer package, which may be installed using Composer:

```bash
composer require syedhamidalishahofficial/cms
```

Once the `hamid/cms` package has been installed, you may install the frontend scaffolding using the `ui` Artisan command:


```bash
// These packages are required ...
composer require spatie/laravel-sluggable                       
composer require mercuryseries/flashy
composer require barryvdh/laravel-debugbar --dev
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"


// php Artisan Commands...
php artisan cms:assets            Publishing Assets
php artisan cms:controllers       To Publish Controllers
php artisan cms:database          To Publish Database files
php artisan cms:middlewares       To Publish Middleware
php artisan cms:models            To Publish Models
php artisan cms:routes            To Publish  Routes
php artisan cms:views             To Publish Views
php artisan migrate:fresh --seed             To Migrate and seeds the data in your database

```
// add these lines in kernel.php $routeMiddleware => []
```
'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,
'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
```
// add this to auth.php 'providers' => []
```
'admin' => [
    'driver' => 'session',
    'provider' => 'admins',
],

```
// add this to auth.php 'guards' => []
```
'admin' => [
    'driver' => 'session',
    'provider' => 'admins',
],
```
// add this to auth.php 'passwords' => []
```
'admins' => [
    'provider' => 'admins',
    'table' => 'password_resets',
    'expire' => 60,
    'throttle' => 60,
],
```
## Contributing

Thank you for considering contributing to Laravel! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

Please review [our security policy](https://github.com/syedhamidalishahofficial/cms/security/policy) on how to report security vulnerabilities.

## License

Laravel is open-sourced software licensed under the [MIT license](LICENSE.md).
