<?php

namespace AbdelhakLallouche\ReactWithLoaderPreset\stubs\providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ReactWithLoaderPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
      Blade::directive('react', function ($expression) {
          $data = json_decode($expression, true);
          $path = $data['path'];
          $loading = (isset($data['loading']) && $data['loading'] == false) ? false : true;
          $class = (isset($data['class'])) ? $data['class'] : '';
          $props = (isset($data['props'])) ? json_encode($data['props']) : '{}';
          return "<div data-path='{$path}' data-loading='{$loading}' data-props='{$props}' class='load-react-component {$class}'></div>";
      });
    }
}
