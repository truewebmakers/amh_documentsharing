<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    use HasFactory;
    protected $guarded =[]; 
    public function receiver()
    {
        return $this->belongsTo(User::class, 'sent_to');
    }
}
