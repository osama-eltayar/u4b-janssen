<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    use HasFiles;

    protected $fillable = ['user_id','path'];

    protected $appends = ['url','download'];

    public function getUrlAttribute()
    {
        return $this->getFileUrl($this->path);
    }

    public function getDownloadAttribute()
    {
        return $this->getDownloadFile($this->path);
    }
}
