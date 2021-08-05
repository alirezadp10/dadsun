<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'url',
        'logo',
    ];

    public function setLogoAttribute($value)
    {
        $image = Image::make($value)->resize(150,150);

        $this->attributes['logo'] = sprintf('images/company/%s',$value->hashName());

        Storage::disk('public')->put($this->attributes['logo'],$image->encode());
    }

    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('images/default/company.png');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->latest()->take(2);
    }
}
