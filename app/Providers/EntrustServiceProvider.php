<?php
namespace App\Providers;

class EntrustServiceProvider extends \Zizaco\Entrust\EntrustServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->bladeDirectives();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        // Call to Entrust::hasRole
        \Blade::directive('role', function($expression) {
            return "<?php if (\\Entrust::hasRole{$expression}) : ?>";
        });

        \Blade::directive('endrole', function($expression) {
            return "<?php endif; // Entrust::hasRole ?>";
        });

        // Call to Entrust::can
        \Blade::directive('permission', function($expression) {
            return "<?php if (\\Entrust::can{$expression}) : ?>";
        });

        \Blade::directive('endpermission', function($expression) {
            return "<?php endif; // Entrust::can ?>";
        });

        // Call to Entrust::ability
        \Blade::directive('ability', function($expression) {
            return "<?php if (\\Entrust::ability{$expression}) : ?>";
        });

        \Blade::directive('endability', function($expression) {
            return "<?php endif; // Entrust::ability ?>";
        });
    }

}