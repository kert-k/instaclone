<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {

        return $this->image ? ('/storage/' . $this->image) : '/storage/no_image.svg.png';
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
