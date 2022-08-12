<?php

namespace Syedhamidalishahofficial\Cms;

class AuthRouteMethods
{
    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return callable
     */
    public function auth()
    {
        return function ($options = []) {
            $namespace = class_exists($this->prependGroupNamespace('auth\LoginController')) ? null : 'App\Http\Controllers';

            $this->group(['namespace' => $namespace], function() use($options) {
                // Login Routes...
                if ($options['login'] ?? true) {
                    $this->get('login', 'auth\LoginController@showLoginForm')->name('login');
                    $this->post('login', 'auth\LoginController@login');
                }

                // Logout Routes...
                if ($options['logout'] ?? true) {
                    $this->post('logout', 'auth\LoginController@logout')->name('logout');
                }

                // Registration Routes...
                if ($options['register'] ?? true) {
                    $this->get('register', 'auth\RegisterController@showRegistrationForm')->name('register');
                    $this->post('register', 'auth\RegisterController@register');
                }

                // Password Reset Routes...
                if ($options['reset'] ?? true) {
                    $this->resetPassword();
                }

                // Password Confirmation Routes...
                if ($options['confirm'] ??
                    class_exists($this->prependGroupNamespace('auth\ConfirmPasswordController'))) {
                    $this->confirmPassword();
                }

                // Email Verification Routes...
                if ($options['verify'] ?? false) {
                    $this->emailVerification();
                }
            });
        };
    }

    /**
     * Register the typical reset password routes for an application.
     *
     * @return callable
     */
    public function resetPassword()
    {
        return function () {
            $this->get('password/reset', 'auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            $this->post('password/email', 'auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            $this->get('password/reset/{token}', 'auth\ResetPasswordController@showResetForm')->name('password.reset');
            $this->post('password/reset', 'auth\ResetPasswordController@reset')->name('password.update');
        };
    }

    /**
     * Register the typical confirm password routes for an application.
     *
     * @return callable
     */
    public function confirmPassword()
    {
        return function () {
            $this->get('password/confirm', 'auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
            $this->post('password/confirm', 'auth\ConfirmPasswordController@confirm');
        };
    }

    /**
     * Register the typical email verification routes for an application.
     *
     * @return callable
     */
    public function emailVerification()
    {
        return function () {
            $this->get('email/verify', 'auth\VerificationController@show')->name('verification.notice');
            $this->get('email/verify/{id}/{hash}', 'auth\VerificationController@verify')->name('verification.verify');
            $this->post('email/resend', 'auth\VerificationController@resend')->name('verification.resend');
        };
    }
}
