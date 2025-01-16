<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Models\TrixRichText;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Te7aHoudini\LaravelTrix\Models\TrixAttachment;

class Post extends Model
{
    use HasFactory, HasTrixRichText;
    protected $guarded = [];
    const EXCERPT_LENGTH = 200;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function content()
    {
        return $this->hasMany(TrixRichText::class, 'model_id');
    }
    public function attachment()
    {
        return $this->hasMany(TrixAttachment::class, 'attachable_id');
    }
    public function excerpt()
    {
        return Str::limit($this->excerpt, Post::EXCERPT_LENGTH);
    }
    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($post) {
            $post->trixRichText->each->delete();
            $post->trixAttachments->each->purge();
        });
    }
}
