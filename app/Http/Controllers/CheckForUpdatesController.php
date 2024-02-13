<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use ZipArchive;

class CheckForUpdatesController extends Command
{
    protected $signature = 'update:check';
    protected $description = 'Check for updates from GitHub and apply them if available';

    public function handle()
    {
        $response = Http::get('https://api.github.com/repos/yourusername/yourrepository/releases/latest');

        if ($response->successful()) {
            $latestVersion = $response->json()['tag_name'];
            $currentVersion = config('app.version'); // Assuming you have a version defined in your configuration

            if (version_compare($latestVersion, $currentVersion, '>')) {
                $this->info("New version available: {$latestVersion}");

                // Download the latest release ZIP archive from GitHub
                $zipFile = Http::get("https://github.com/yourusername/yourrepository/archive/{$latestVersion}.zip")->body();

                // Extract the contents of the ZIP archive
                file_put_contents(storage_path("updates/{$latestVersion}.zip"), $zipFile);
                $zip = new ZipArchive;
                $zip->open(storage_path("updates/{$latestVersion}.zip"));
                $zip->extractTo(base_path());
                $zip->close();

                // Perform any additional update tasks (e.g., migrations, cache clearing)
                // Example: run database migrations
                $this->call('migrate');

                $this->info('Update applied successfully.');
            } else {
                $this->info('Your application is up to date.');
            }
        } else {
            $this->error('Failed to check for updates. Please try again later.');
        }
    }
}
