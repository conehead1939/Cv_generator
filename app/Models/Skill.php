<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['cv_id', 'name', 'level'];

    public function cv()
    {
        return $this->belongsTo(CV::class,'cv_id');
    }
}
