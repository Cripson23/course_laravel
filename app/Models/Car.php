<?php

namespace App\Models;

use App\Enums\Cars\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['brand_id', 'model', 'price', 'body_type', 'vin', 'status'];
    //protected $dates = [];
    //protected $guarded = [];

    // касты + enum
    protected $casts = ['status' => Status::class];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_car')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'entity');
    }

    // динамическое поле - аксессор
    public function getCanDeleteAttribute()
    {
        return $this->status === Status::DRAFT || $this->status === Status::CANCELED;
    }

    // мутатор
    public function setModelAttribute($value)
    {
        $this->attributes['model'] = strtolower($value);
    }

    // диапазоны запроса - скопы
    public function scopeOfActive($query)
    {
        return $query->where(['status' => Status::ACTIVE]);
    }

    /*
    public function updateTags($newTags)
    {
        $actuallyTags = $this->tags->pluck('id')->toArray();
        $newTags = $newTags === null ? [] : $newTags;
        $detachTags = array_diff($actuallyTags, $newTags);
        $attachTags = array_diff($newTags, $actuallyTags);
        if (count($detachTags)) {
            $this->tags()->detach($detachTags);
        }
        if (count($attachTags)) {
            $this->tags()->attach($attachTags);
        }
    }*/
}
