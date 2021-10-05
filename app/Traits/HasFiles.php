<?php

namespace App\Traits;


use App\Http\Controllers\UploadController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;

trait HasFiles
{
    public function storeFile(string $dirName , $file, $parent = NULL)
    {
        $path = $dirName.'/';
        $path.= $parent ? $parent->id : '' ;
        $path = Storage::putFile($path, $file);

        return $path ;
    }

    public function storeBase64(string $dirName , $encryptedString, $parent = NULL)
    {
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $encryptedString));
        $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
        file_put_contents($tmpFilePath, $image);
        $image = new File($tmpFilePath);
        $image = new UploadedFile(
            $image->getPathname(),
            $image->getFilename(),
            $image->getMimeType(),
            0,
            true
        );
        return $this->storeFile($dirName,$image, $parent);
    }

    public function getFileUrl($path): ?string
    {
        if($path)
            return route('uploads.show',$path);
        return null;
    }

    public function deleteFile($path): ?bool
    {
        if($path)
            return Storage::delete($path);
        return null;
    }

    public function getMimeType($path)
    {
        if($path)
            return Storage::mimeType($path);
        return null;
    }

    public function getDownloadFile($path): ?string
    {
        if($path)
            return route('uploads.download',$path);
        return null;
    }

    private function deleteDirectory(string $directory, $child = NULL)
    {
        Storage::deleteDirectory("$directory/$child");
    }
}
