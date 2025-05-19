<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CV extends Model
{
    use HasFactory;
    protected $table = 'cvs';

    protected $fillable = ['user_id', 'title', 'summary'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'cv_id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'cv_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'cv_id');
    }

    public function languages()
    {
        return $this->hasMany(Language::class, 'cv_id');
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class, 'cv_id');
    }
    public function generatedCv()
    {
        return $this->hasOne(GeneratedCV::class, 'cv_id');
    }
}
