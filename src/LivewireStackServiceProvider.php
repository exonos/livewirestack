<?php
namespace Exonos\LivewireStack;

use App\Extensions\Forms\Components\TextInput;
use Exonos\Livewirestack\Components\Input;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireStackServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->registerConfig();
        $this->registerComponents();
        $this->registerDirectives();


        $this->publishes([
            __DIR__.'/../public/intl-tel-input' => public_path('intl-tel-input'),
            __DIR__.'/../public/livewirestack.css' => public_path('vendor/livewirestack/livewirestack.css'),
            __DIR__.'/../public/livewirestack.js' => public_path('vendor/livewirestack/livewirestack.js'),
        ], ['laravel-assets']);
    }

    public function registerConfig(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'livewirestack');
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'livewirestack');

        $this->publishes([__DIR__.'/config/config.php' => config_path('livewirestack.php')], 'livewirestack.config');
        $this->publishes([__DIR__.'/resources/views' => resource_path('views/vendor/livewirestack')], 'livewirestack.views');
    }

    /**
     * Registering components from config.
     *
     */
    public function registerComponents()
    {
        $prefix = config('livewirestack.prefix');

        foreach (config('livewirestack.components') as $alias => $class) {
            Blade::component($prefix. $alias, $class);
        }

    }

    public function registerDirectives()
    {
        Blade::directive('livewirestackScripts', function () {
            return '<script src="' . asset('vendor/livewirestack/livewirestack.js') . '"></script>'.
                '<?php echo $__env->yieldPushContent("livewirestack-scripts"); ?>';
        });

        Blade::directive('livewirestackStyles', function () {
            return '<link rel="stylesheet" type="text/css" href="' . asset('vendor/livewirestack/livewirestack.css') . '">'.
                '<?php echo $__env->yieldPushContent("livewirestack-styles"); ?>';
        });
    }
}
