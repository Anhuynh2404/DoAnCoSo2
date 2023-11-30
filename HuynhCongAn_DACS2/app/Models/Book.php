<?php

namespace App\Models;


use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, HandleImageTrait;

    protected $fillable =[
        'name',
        'description',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'book_publisher', 'book_id', 'publisher_id')
        ->withTimestamps();
    }

    public function assignCategory($categoryIds){
        return $this->categories()->sync($categoryIds);
    }

    public function assignAuthor($authorIds){
        return $this->authors()->sync($authorIds);
    }

    public function assignPublisher($publisherIds){
        return $this->publishers()->sync($publisherIds);
    }


}
