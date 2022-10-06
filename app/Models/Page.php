<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Page extends Model
{
    use HasFactory;

    protected $hidden = [
        'book_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the book this page belongs to
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    Public function book(){
        return $this->belongsTo(Book::Class);
    }

    // HACK: possible? good idea?
    // /**
    //  * Get the author of this book
    //  *
    //  * @return  Illuminate\Database\Eloquent\Model
    //  */
    // Public function author(){
    //     return $this->book->user;
    // }

    /**
     * Get a collection containing the page(s) leading to this page
     *
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function origins(){
        return $this->belongsToMany(Page::class, 'pages_pages', 'destination_page_id', 'origin_page_id');
    }

    /**
     * Get a collection containing the page(s) where this page leads to
     *
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function destinations(){
        return $this->belongsToMany(Page::class, 'pages_pages', 'origin_page_id', 'destination_page_id');
    }

    /**
     * Getter/Setter of the 'state' attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function state(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }

    /**
     * Getter/Setter of the 'content' attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }

    /**
     *
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function start(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ($attributes['state'] == 'start'),
        );
    }

    /**
     *
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function ongoing(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ($attributes['state'] == 'ongoing'),
        );
    }

    /**
     *
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function defeat(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ($attributes['state'] == 'defeat'),
        );
    }

    /**
     *
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function victory(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ($attributes['state'] == 'victory'),
        );
    }
}
