<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneratedCV extends Model
{
    protected $fillable = ['cv_id', 'user_id', 'file_path', 'template'];
    protected $table = 'generated_cvs';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cv() {
        return $this->belongsTo(CV::class, 'cv_id');
    }
}
