<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contato extends Model
{

    protected $fillable = ['nome', 'email', 'telefone', 'motivo_contato', 'mensagem'];

    
    use HasFactory, SoftDeletes;
}
