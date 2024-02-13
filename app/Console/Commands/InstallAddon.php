<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//use App\Services\AddonInstaller;

class InstallAddon extends Command
{
    protected $signature = 'addon:install {addon}';
    protected $description = 'Install an addon package';

    protected $installer;

    // public function __construct(AddonInstaller $installer)
    // {
    //     parent::__construct();
    //     $this->installer = $installer;
    // }

    public function handle()
    {
        $addon = $this->argument('addon');

        if (!file_exists($addon)) {
            $this->error("Addon not found at: {$addon}");
            return;
        }

        $this->installer->install($addon);
        $this->info('Addon installed successfully.');
    }
}
