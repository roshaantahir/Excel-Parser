<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['header_id', 'value'];

    public function header()
    {
        return $this->belongsTo(Header::class);
    }

}
