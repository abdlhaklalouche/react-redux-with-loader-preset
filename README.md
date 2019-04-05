# Laravel React With Loader Preset

## About 

A laravel preset for using react quickly with autoloading components.

## Installation

1. Install Laravel and cd to your project.
2. Install this preset via `composer require abdlhaklalouche/react-with-loader-preset`

## Usage

### Initializing the preset

1. `php artisan preset react-with-loader`
2. `npm install`
2. `npm run watch` or `npm run dev` or `npm run prod`
3. `php artisan serve` to run the server.

### Using the preset

1. To create a component go to resources/js/components and create any component
2. To use that component without render it manualy you just have to use directive code bellow: 

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

Copyright 2018 [Laravel react-with-loader-preset Contributers](https://github.com/abdlhaklalouche/react-with-loader-preset/graphs/contributors) under the [MIT license](http://opensource.org/licenses/MIT).
