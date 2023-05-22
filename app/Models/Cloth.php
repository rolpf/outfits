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

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'cloth_category');
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'cloth_brand');
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
