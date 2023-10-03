<?php

namespace App\http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class getIcons extends Component
{

    public $path, $icons;

    public static function getSvgIcons(): mixed
    {
        $path =  resource_path('views/components/svg/macroprocess');
        if (File::exists($path)) {
            $icons = collect(File::files($path))
                ->map(function ($file) {
                    str_replace('.blade.php', '', $file->getFilename());
                });
        } else {
            $icons = collect();
        }

        return $icons;
    }
}
