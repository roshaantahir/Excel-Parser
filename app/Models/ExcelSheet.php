<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelSheet extends Model
{
    use HasFactory;

    protected $fillable = ['file_name'];

    public function headers()
    {
        return $this->hasMany(Header::class , 'excel_sheet_id', 'id');
    }
    public function getHeaderIds()
    {
        $header_ids = [];
        foreach ($this->headers as $header)
        {
            array_push($header_ids, $header->id);
        }
        return $header_ids;
    }
}

