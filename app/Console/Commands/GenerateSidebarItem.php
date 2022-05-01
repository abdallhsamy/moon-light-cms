<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateSidebarItem extends Command
{
    protected $signature = 'make:sidebar-item {module}';

    protected $description = 'Generates a new sidebar item';

    public function handle()
    {
        $file_data = file_get_contents(resource_path('js/data/sidebar/index.js'));

        $objectString = '{
        "title" : "##Module## Management",
        "icon" : "fas fa-tachometer-alt",
        "link" : "#",
        "folder" : "##module##s",
        "permission" : "list_##module##s",
        "sub_list" : [
            {
                "title" : "##Module##s List",
                "icon" : "fas fa-user nav-icon",
                "route" : "##module##s.index",
                "component" : "##module##s/Index",
                "permission" : "list_##module##s"
            },{
                "title" : "Add ##Module##",
                "icon" : "fas fa-user nav-icon",
                "route" : "##module##s.create",
                "component" : "##module##s/Create",
                "permission" : "create_##module##s"
            },
        ]
    }';

        $arg = Str::singular($this->argument('module'));

        $Module = Str::title($arg);
        $module = Str::snake($arg);

        $objectString = str_replace(['##Module##', '##module##'], [$Module, $module], $objectString);

        $file_data = substr($file_data, 0, strrpos($file_data, "]"));
        $file_data .= ',' . PHP_EOL;
        $file_data .= $objectString;
        $file_data .= PHP_EOL .']';

        file_put_contents(resource_path('js/data/sidebar/index.js'), $file_data);

        $this->info("menu items added successfully , don't forget to nm command to see newly added menu items");
        $this->comment("npm run dev");

    }
}
