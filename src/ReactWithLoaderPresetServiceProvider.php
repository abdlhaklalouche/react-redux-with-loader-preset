<?php

namespace AbdelhakLallouche\ReactWithLoaderPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class ReactWithLoaderPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('react-with-loader', function ($command) {
            $command->info('React with loader preset installed successfully.');
            $command->info('Please run "npm install" to install all required dependencies and run "npm run watch" to start developing.');
            ReactWithLoaderPreset::install();
        });
    }
}
