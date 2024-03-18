<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'book_image_url', 'author_id',
        'translator', 'publication', 'isbn', 'cover_type', 'size',
        'page_count', 'print_number', 'publish_date','slug','category_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function stocks()
    {
        return $this->hasMany(BookStock::class);
    }


    public function stock()
    {
        return $this->hasOne(BookStock::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphMany(Tag::class, 'taggable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
