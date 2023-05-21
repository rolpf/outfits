<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cloth extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'thumbnail',
    ];

    protected $table = 'clothes';

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'cloth_category');
    }

    public function brands(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'cloth_brand');
    }

    public function outfits(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Outfit::class);
    }

    public function getImageUrl() {
        if (filter_var($this->thumbnail, FILTER_VALIDATE_URL) !== false) {
            return $this->thumbnail;
        }

        return Storage::disk('public')->url($this->thumbnail);
    }
}
