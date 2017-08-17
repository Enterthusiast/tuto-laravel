<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot() {
        Validator::extend('aaaaa', function($attribute, $value, $parameters) {
            return $value === 'aaaaa';
        });
    }

    public function register() {

    }

}