<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Touhidurabir\StubGenerator\Facades\StubGenerator;

class GenerateIndexVue extends Command
{
    protected $signature = 'make:index-vue  {module}  {--force}';

    protected $description = 'Generate Index Vue Component';

    protected string $file_name = 'Index';

    protected string $ext = 'vue';

    public function handle()
    {
        $stub = 'stubs/index-vue.stub';

        $module = Str::of($this->argument('module'))
            ->plural()
            ->snake();

        $destination = "resources/js/Pages/${module}";

        if (! is_dir(base_path($destination)) && !mkdir(base_path($destination))) {
            $error = "Directory " . $destination . " cannot be created";

            $this->error($error);

            return 0;
        }

        if (file_exists ( base_path("${destination}/$this->file_name.$this->ext"))) {
            if (! $this->option('force')) {
                $this->error("file is already exists in path : ${destination}/$this->file_name.$this->ext");

                return 0;
            }

            unlink(base_path("${destination}/$this->file_name.$this->ext"));
        }

        StubGenerator::from($stub)
            ->to($destination)
            ->as($this->file_name)
            ->ext($this->ext)
            ->withReplacers([
                'Module' => Str::of($module)->title(),
                'module' => $module
            ])
            ->save();

        $this->info("file created successfully in path : ${destination}/$this->file_name.$this->ext");

        return 0;
    }
}
