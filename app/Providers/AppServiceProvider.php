<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Asegúrate de importar View
use App\Models\Anunciante;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        $anunciantes = Anunciante::with('usuario')->get();
        View::share('anunciantes', $anunciantes);
    }
}
