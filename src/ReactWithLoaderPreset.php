<?php
namespace AbdelhakLallouche\ReactWithLoaderPreset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class ReactWithLoaderPreset extends Preset
{
    public static function install()
    {
        static::removeAllPresets();
        static::updatePackages();
        static::updateBootstrapping();
        static::updateWelcomePage();
        static::removeNodeModules();
        static::addControllers();
    }

    protected static function removeAllPresets()
    {
        Artisan::call('preset',[
            'type' => 'none'
        ]);
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            "laravel-mix" => "^4.0.7",
            "@babel/plugin-proposal-class-properties" => "^7.2.3",
            "@babel/preset-react" => "^7.0.0",
            "babel-plugin-syntax-dynamic-import" => "^6.18.0",
            "babel-preset-react" => "^6.23.0",
            "clean-webpack-plugin" => "^1.0.0",
            "react" => "^16.7.0",
            "react-dom" => "^16.7.0",
            "resolve-url-loader" => "^2.3.1",
        ], Arr::except($packages, [
            'bootstrap',
            'bootstrap-sass',
            'popper.js',
            'laravel-mix',
            'jquery',
        ]));
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/stubs/.babelrc', base_path('.babelrc'));
        copy(__DIR__.'/stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__.'/stubs/resources/js/laravel-react-loader.js', resource_path('js/laravel-react-loader.js'));
        copy(__DIR__.'/stubs/resources/js/components/Welcome.js', resource_path('js/components/Welcome.js'));
    }

    protected static function updateWelcomePage()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));
        copy(__DIR__.'/stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    protected static function addControllers()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
        
        file_put_contents(
            base_path('routes/web.php'),
            "Route::get('/', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );

        (new Filesystem)->copyDirectory(__DIR__.'/stubs/resources/views', resource_path('views'));
    }

    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/stubs/controllers/HomeController.stub')
        );
    }
}