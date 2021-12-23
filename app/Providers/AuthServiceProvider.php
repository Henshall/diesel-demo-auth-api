<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\JwtDecoder;

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
            // ASSIGN JWT TOKEN
            $jwt = $request->bearerToken();
            // DECODE JWT USER OBJECT FROM REQUEST
            $jwtUser = JwtDecoder::decode($jwt);
            // HYDRATE USER MODEL
            $user = new User;
            $user->fill( (array) $jwtUser);
            // RETURN HYDRATED MODEL
            return $user; 
        });
    }
}
