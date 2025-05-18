<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'published_date',
        'title',
        'subtitle',
        'slug',
        'summary',
        'content',
        'photo'
    ];

    protected $dates = [
        'published_date',
        'created_at',
        'updated_at',
    ];

    // Boot method untuk event model
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set published_date jika belum diisi
            if (empty($model->published_date)) {
                $model->published_date = now()->toDateString();
            }

            // Set slug dari title jika kosong
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });

        static::updating(function ($model) {
            // Update slug jika title berubah
            if ($model->isDirty('title')) {
                $model->slug = Str::slug($model->title);
            }
        });
    }
}
