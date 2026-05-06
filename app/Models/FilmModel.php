<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'genre_id',
        'title',
        'director',
        'actors',
        'year',
        'rating',
        'synopsis',
        'poster',
        'created_at',
    ];
}
