<?php

declare(strict_types=1);

namespace levijackson\Pattern\Structural\Decorator\Users;

class Manager extends Account {

    protected Account $account;

    public function __construct(Account $account) {
        $this->account = $account;
    }

    public function getInfo(): string {
        return $this->account->getInfo() . ' (Manager)';
    }

}