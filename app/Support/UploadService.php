<?php

namespace App\Support;

use File;
use Illuminate\Http\UploadedFile;

class UploadService
{
    /**
     * @param UploadedFile $foto
     * @param string $hash
     * @return string
     */
    public function uploadFile(UploadedFile $foto, string $hash): string
    {
        if (!File::exists('arquivos/fotos/')) {
            File::makeDirectory('arquivos/fotos/');
        }
        $directory = "arquivos/fotos/";

        if (!File::exists($directory)) {
            $result = File::makeDirectory($directory);
        }

        if (!empty($foto)) {
            $namefull = $hash . '.' . $foto->getClientOriginalExtension();
            $foto->move($directory, $namefull);
            return $namefull;
        }
    }
}
