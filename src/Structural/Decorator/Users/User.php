<?php

declare(strict_types=1);

namespace levijackson\Pattern\Structural\Decorator\Users;

class User extends Account {

    public function getInfo(): string {
        return $this->name . ' | Permissions: (User)';
    }

}