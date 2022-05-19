<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

          // Dashboard Gate's
          Gate::define("ver-dashboard", function ($user) {
            return $user->role->hasPermission("ver-dashboard");
        });


        // Cliente Gate's
        Gate::define("gerir-cliente", function ($user) {
            return $user->role->hasPermission("gerir-cliente");
        });


        Gate::define("registar-cliente", function ($user) {
            return $user->role->hasPermission("registar-cliente");
        });

        Gate::define("editar-cliente", function ($user) {
            return $user->role->hasPermission("editar-cliente");
        });

        Gate::define("apagar-cliente", function ($user) {
            return $user->role->hasPermission("apagar-cliente");
        });
        // Conta Gate's

        Gate::define("gerir-conta", function ($user) {
            return $user->role->hasPermission("gerir-conta");
        });

        Gate::define("registar-conta", function ($user) {
            return $user->role->hasPermission("registar-conta");
        });

        Gate::define("editar-conta", function ($user) {
            return $user->role->hasPermission("editar-conta");
        });

        Gate::define("consultar-conta", function ($user) {
            return $user->role->hasPermission("consultar-conta");
        });

        Gate::define("apagar-conta", function ($user) {
            return $user->role->hasPermission("apagar-conta");
        });

        Gate::define("pagar-conta", function ($user) {
            return $user->role->hasPermission("pagar-conta");
        });


        // Pagamento Gate's
        Gate::define("gerir-pagamento", function ($user) {
            return $user->role->hasPermission("gerir-pagamento");
        });


        // Estabelecimento Gate´s
        Gate::define('gerir-empresa', function ($user) {
            return $user->role->hasPermission('gerir-empresa');
        });
        Gate::define('registar-empresa', function ($user) {
            return $user->role->hasPermission('registar-empresa');
        });

      


        // Utilizador Gate's

        Gate::define("gerir-utilizador", function ($user) {
            return $user->role->hasPermission("gerir-utilizador");
        });

        Gate::define("registar-utilizador", function ($user) {
            return $user->role->hasPermission("registar-utilizador");
        });

        Gate::define("editar-utilizador", function ($user) {
            return $user->role->hasPermission("editar-utilizador");
        });

        

        // Gate::define("consultar-utilizador",function($user){
        //     return $user->role->hasPermission("consultar-utilizador");
        // });

        Gate::define("apagar-utilizador", function ($user) {
            return $user->role->hasPermission("apagar-utilizador");
        });


        //Fornecedor Gateś

        Gate::define("gerir-evento", function ($user) {
            return $user->role->hasPermission("gerir-evento");
        });

        Gate::define("registar-evento", function ($user) {
            return $user->role->hasPermission("registar-evento");
        });
        Gate::define("editar-evento", function ($user) {
            return $user->role->hasPermission("editar-evento");
        });

        Gate::define("apagar-evento", function ($user) {
            return $user->role->hasPermission("apagar-evento");
        });


       
    }
}
