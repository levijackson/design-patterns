<?php

declare(strict_types=1);

namespace levijackson\Pattern\Behavioural\Observer\Notifications;

use SplObserver;
use SplSubject;

abstract class BaseObserver implements SplObserver {

    const STATUS_SENT = 1;
    const STATUS_NOT_SENT = 0;

    protected $status = self::STATUS_NOT_SENT;

    public function getStatus(): int {
        return $this->status;
    }

    public function update(SplSubject $subject): void {
        $this->status = self::STATUS_SENT;
    }
}