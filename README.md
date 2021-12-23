<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## DEMO APP

OVERVIEW: 

This project is an AUTH demo project. Its purpose is to authenticate users using JWT tokens and cognito.
The api contains a list of famous quotes we can preform mock crud operations on.

USING:

the project has three routes:

GET /api/quotes    (no middleware)
GET /api/quotes/{id} (custom auth middleware)
POST /api/quotes (custom middleware using auth guards)

The live version is available on: diesel-demo.weshenshall.com

To use this - send requests to the above routes to get the requested resources. for the routes with authentication, you will need to pass a JWT token which was created using the key dGf6EwOwnTwRvG2SXYXPnG8yYEUM29NiwrdemtdM9v1AN9UCLpwbKT42yq2KbSeQ

ADDITIONALLY, you will need to add this into the .env file: 

JWT_SECRET=dGf6EwOwnTwRvG2SXYXPnG8yYEUM29NiwrdemtdM9v1AN9UCLpwbKT42yq2KbSeQ

