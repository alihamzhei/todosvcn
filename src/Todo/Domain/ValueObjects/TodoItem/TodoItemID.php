<?php

namespace Src\Todo\Domain\ValueObjects\TodoItem;

class TodoItemID
{
    public function __construct(public int $todoID)
    {
    }
}
