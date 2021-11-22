<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthServiceProvider extends ServiceProvider
{
    /**
    * The policy mappings for the application.
    *
    * @var array
    */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];
    
    /**
    * Register any authentication / authorization services.
    *
    * @return void
    */
    public function boot()
    {
        $this->registerPolicies();
        
        Auth::viaRequest('jwt', function (Request $request) {
            // SET TOKEN AND SECRET KEY
            $jwtClientToken = $request->bearerToken();
            $jwtSecretKey = new Key(config("jwt.secret"), 'HS256');
            // DECODE USER
            $jwtUser = JWT::decode($jwtClientToken, $jwtSecretKey);
            // HYDRATE USER MODEL
            $user = new User;
            return $user->fill( (array) $jwtUser);
        });
    }
}
