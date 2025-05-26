<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;
    

    protected $fillable = ['cv_id', 'name', 'proficiency'];

    public function cv()
    {
        return $this->belongsTo(CV::class,'cv_id');
    }
}
