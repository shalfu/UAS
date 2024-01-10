<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['id','judul','penulis','tahun_terbit','ISBN'];
    protected $table = 'bukus';
    public $timestamps = false;

}
