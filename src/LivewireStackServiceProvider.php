<?php
namespace Exonos\Livewirestack;

use App\Extensions\Forms\Components\TextInput;
use Exonos\Livewirestack\Foundation\ConfirmationModal;
use Exonos\Livewirestack\Foundation\Modal;
use Exonos\Livewirestack\Foundation\SlideOver;
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
        $this->registerViews();
        $this->registerComponents();
        $this->registerDirectives();
        $this->registerLivewireComponents();


        // Publicar activos (CSS, JS)
        $this->publishes([
            __DIR__.'/../public/intl-tel-input' => public_path('intl-tel-input'),
            __DIR__.'/../public/livewirestack.css' => public_path('vendor/livewirestack/livewirestack.css'),
            __DIR__.'/../public/livewirestack.js' => public_path('vendor/livewirestack/livewirestack.js'),
        ], ['laravel-assets']);

        // Publicar vistas y componentes
        $this->publishes([
            __DIR__.'/Components/Input.php' => app_path('View/Components/Input.php'),
            __DIR__.'/resources/views/input.blade.php' => resource_path('views/vendor/livewirestack/input.blade.php'),
        ], ['livewirestack.components.input']);

        $this->publishes([
            __DIR__.'/Components/Builder/Component.php' => app_path('View/Components/Component.php'),
        ], ['livewirestack.components.base']);

        $this->publishes([
            __DIR__.'/Components/Builder/Button.php' => app_path('View/Components/Button.php'),
            __DIR__.'/resources/views/button.blade.php' => resource_path('views/vendor/livewirestack/button.blade.php'),
        ], ['livewirestack.components.button']);
    }

    public function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'livewirestack');
        $this->publishes([__DIR__.'/config/config.php' => config_path('livewirestack.php')], 'livewirestack.config');
    }
    public function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'livewirestack');
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
            $publishedPath = app_path("View/Components/{$alias}.php");

            // Registrar el componente desde la ruta publicada si existe
            if (file_exists($publishedPath)) {
                Blade::component($prefix . $alias, $publishedPath);
            } else {
                // Si no se ha publicado, registrar la versión original
                Blade::component($prefix . $alias, $class);
            }
        }
    }

    public function registerDirectives()
    {
        Blade::directive('livewirestackScripts', function () {
            return '<script src="' . asset('vendor/livewirestack/livewirestack.js') . '"></script>'.
                '<?php echo $__env->yieldPushContent("livewirestack-scripts"); ?>'.
                '<?php echo $__env->yieldPushContent("livewirestack-styles"); ?>';
        });

        Blade::directive('livewirestackStyles', function () {
            return '<link rel="stylesheet" type="text/css" href="' . asset('vendor/livewirestack/livewirestack.css') . '">';
        });
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('modal', Modal::class);
        Livewire::component('confirmation', ConfirmationModal::class);
        Livewire::component('slide-over', SlideOver::class);
    }
}
