<?php

namespace Src\Todo\Application\DTOs;

class TodoItemDTO
{
    public function __construct(
        public string $title,
        public string $text,
        public string $priority,
        public ?int   $todo_id = null,
    )
    {

    }
}
