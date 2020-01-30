<?php

namespace Laraex;

use Illuminate\Support\Str;

class Laraex 
{
    use Functions\ThemeHelp;

    // Build your next great package.
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public static function testing()
    {
        echo 'lara yes testing...!';
    }

    public static function createController($dir, $name)
    {
        try {
            $today      = date("Y/m/d H:i:s");
            $dir        = Str::studly($dir);
            $dirView    = str_replace( ['\\', '/'], '.', $dir);
            $name       = Str::camel($name);
            $path       = app_path('Http/Controllers/Backend/'.$dir);
            $filename   = $name.'Controller.php';

            if (! file_exists($path)) 
                mkdir($path, 0755, true);

            $template = str_replace(
                [
                    '{{today}}',
                    '{{modelName}}',
                    '{{directory}}',
                    '{{directoryView}}',
                ],
                [
                    $today,
                    $name,
                    $dir,
                    $dirView,
                ],
                self::getStub('controller')
            );

            if (! \file_exists("$path/$filename"))
                file_put_contents("$path/$filename", $template);
        } 
        catch(Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                // 'path' => $path,
                // 'file' => $filename
            ]);
        }

        return response()->json([
            'error' => false,
            'message' => 'Success',
            // 'path' => $path,
            // 'file' => $filename
        ]);
    }

    public static function getStub($type)
    {
        return \file_get_contents(__dir__."/Stubs/$type.stub");
    }
}
