<?php

declare(strict_types=1);

namespace levijackson\Pattern\Structural\Decorator\Users;

abstract class Account {

    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    abstract public function getInfo(): string;
}