<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratSkp extends Model
{
    use HasFactory;
    protected $table = 'surat_skpp';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
