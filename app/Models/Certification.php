<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id', 'title', 'issuer', 'date_obtained', 'description'
    ];

    public function cv()
    {
        return $this->belongsTo(CV::class,'cv_id');
    }
}
