<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $table = 'tarefas';
    protected $fillable = ['tarefa', 'data_limite_conclusao', 'user_id'];
    protected $append = ['data_limite_formatada'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dataLimiteFormatada(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d/m/Y', strtotime($this->data_limite_conclusao))
        );
    }

}
