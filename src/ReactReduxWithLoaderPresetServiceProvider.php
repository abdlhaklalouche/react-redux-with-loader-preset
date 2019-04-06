<?php

namespace AbdelhakLallouche\ReactReduxWithLoaderPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class ReactReduxWithLoaderPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('react-redux-with-loader', function ($command) {
            $command->info('React and redux with loader preset installed successfully.');
            $command->info('Please run "npm install" to install all required dependencies and run "npm run watch" to start developing.');
            ReactReduxWithLoaderPreset::install();
        });
    }
}
