# Laravel React And Redux With Loader Preset

## About 

A laravel preset for using react with redux quickly with autoloading components.

## Installation

1. Install Laravel and cd to your project.
2. Install this preset via `composer require abdlhaklalouche/react-redux-with-loader-preset`

## Usage

### Initializing the preset

1. `php artisan preset react-redux-with-loader`
2. `npm install`
2. `npm run watch` or `npm run dev` or `npm run prod`
3. `php artisan serve` to run the server.

### Using the preset

1. To create a component or container go to `resources/js/components` or `resources/js/containers` and create any component then create reducers in `resources/js/components` and make the  actions and store them in `resources/js/actions`.

2. To use that component/containers without render it manualy you just have to use directive code bellow: 

```h
@react({
    "path": "components/COMPONENT_FILENAME_HERE",
    "loading": TRUE_OR_FALSE,
    "class": "CSS_CLASSES_HERE",
    "props": {
        "PROPERTY_NAME": "PROPERTY_VALUE"
    }
})
```

## Copyright and license

Copyright 2018 [Laravel react-redux-with-loader-preset Contributers](https://github.com/abdlhaklalouche/react-redux-with-loader-preset/graphs/contributors) under the [MIT license](http://opensource.org/licenses/MIT).
