<?php

namespace Src\Todo\Application\DTOs;

class TodoListDTO
{
    public function __construct(
        public string $title ,
        public int $user_id
    )
    {

    }
}
