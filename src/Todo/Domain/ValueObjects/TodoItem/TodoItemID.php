<?php

namespace Src\Todo\Domain\ValueObjects\TodoItem;

use Src\Todo\Infrastructure\Repositories\TodoItemRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TodoItemID
{
    public function __construct(public int $todoID)
    {
        $todoRepo = app(TodoItemRepositoryInterface::class);

        if (!$todoRepo->find($todoID)) {
            throw new NotFoundHttpException();
        };
    }
}
