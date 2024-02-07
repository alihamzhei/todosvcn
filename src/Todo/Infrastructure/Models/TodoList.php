<?php

namespace Src\Todo\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TodoList extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function todoItems(): HasMany
    {
        return $this->hasMany(TodoItem::class , 'todo_id' , 'id');
    }
}
