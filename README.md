# Laravel CMS Package

<a href="https://packagist.org/packages/syedhamidalishahofficial/cms"><img src="https://img.shields.io/packagist/dt/hamid/ui" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/syedhamidalishahofficial/cms"><img src="https://img.shields.io/packagist/v/hamid/ui" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/syedhamidalishahofficial/cms"><img src="https://img.shields.io/packagist/l/hamid/ui" alt="License"></a>

## Introduction

It is provides a starting point for any laravel project (Frontend Backend system.

## Official Documentation

### Installation

The Cms provided by Syed Hamid Ali Shah is located in the `syedhamidalishahofficial/cms` Composer package, which may be installed using Composer:

```bash
composer require syedhamidalishahofficial/cms
```

Once the `syedhamidalishahofficial/cms` package has been installed, you may install the frontend scaffolding using the `ui` Artisan command:
#  Step To Be Followed
```bash
# Create your database and connect with your project
# Run these commands
composer require spatie/laravel-sluggable                       
composer require mercuryseries/flashy
composer require barryvdh/laravel-debugbar --dev
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"


php artisan cms:assets            #To Publish Assets
php artisan cms:controllers       #To Publish Controllers
php artisan cms:database          #To Publish Database files
php artisan cms:middlewares       #To Publish Middleware
php artisan cms:models            #To Publish Models
php artisan cms:routes            #To Publish Routes
php artisan cms:views             #To Publish Views
php artisan migrate:fresh --seed  #To Migrate and seeds the data in your database

```
// Add these lines in kernel.php inside the $routeMiddleware => [] Array
```
'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,
'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
```
// Add this to auth.php inside the 'guards' => [] Array
```
'admin' => [
    'driver' => 'session',
    'provider' => 'admins',
],

```
// Add this to auth.php inside the 'providers' => [] Array
```
'admins' => [
    'driver' => 'eloquent',
    'model' => App\Models\Admin::class,
],
```
// Add this to auth.php inside the 'passwords' => [] Array
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
