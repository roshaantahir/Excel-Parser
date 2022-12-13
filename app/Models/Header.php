<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = ['excel_sheet_id','header_name'];

    public function contents()
    {
        return $this->hasMany(Content::class,'header_id','id');
    }
    public function excelSheet()
    {
        return $this->belongsTo(ExcelSheet::class);
    }
}
