<?php

namespace Src\Todo\Domain\ValueObjects\TodoList;

class TodoListID
{
    public function __construct(public int $todoID)
    {
    }
}
