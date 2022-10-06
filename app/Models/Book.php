<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Page;

class Book extends Model
{
    use HasFactory;

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the author of this book
     *
     * @return  Illuminate\Database\Eloquent\Model
     */
    Public function user()
    {
        return $this->belongsTo(User::Class);
    }

    /**
     * Get a collection containing the pages of this book
     *
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Getter/Setter of the 'name' attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute;
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }

    /**
     * Getter/Setter of the 'cover' attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute;
     */
    protected function cover(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }

    /**
     * Getter/Setter of the 'description' attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute;
     */
    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }
}
