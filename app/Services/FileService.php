<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileService
{
    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function content(UploadedFile $file): mixed
    {
        $content = $file->getContent();

        return [
            'content' => nl2br($content),
            'characters' => strlen($content),
            'numbers' => preg_match_all( "/[0-9]/", $content)
        ];
    }

}
