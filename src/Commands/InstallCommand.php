<?php

namespace Andruby\DeepDocs\Commands;

use Andruby\DeepDocs\DocsServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Andruby\DeepAdmin\AdminServiceProvider;
use Symfony\Component\Process\Process;
use BinaryTorch\LaRecipe\LaRecipeServiceProvider;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deep_docs:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install deep docs and publish the required assets and configurations.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Publishing assets and congigurations.. 🍪');
        $this->call('vendor:publish', ['--provider' => AdminServiceProvider::class]);
        $this->call('vendor:publish', ['--provider' => \Andruby\DeepAdmin\AdminServiceProvider::class]);

        $this->call('vendor:publish', ['--provider' => LaRecipeServiceProvider::class, '--tag' => ['larecipe_assets', 'larecipe_config', 'larecipe_views']]);

        $this->call('vendor:publish', ['--provider' => DocsServiceProvider::class]);

        $this->call('vendor:publish', ['--provider' => DocsServiceProvider::class,
            '--tag' => ['deep-docs-views'], '--force' => 'true']);

        $this->info('DeepDocs successfully installed! Enjoy 😍');
        $this->info('Visit http://host/dadamin in your browser 👻');
    }

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY . '" ' . getcwd() . '/composer.phar';
        }

        return 'composer';
    }
}
