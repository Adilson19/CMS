<?php

namespace App\Models;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public $uploads = '/images/posts/';

    protected $fillable = ['image'];

    protected function image(): Attribute{

        return Attribute::make(
            get: fn($image) => $this->uploads. $image
        );
    }
}
