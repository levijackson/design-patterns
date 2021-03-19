<?php

declare(strict_types=1);

namespace levijackson\Pattern\Behavioural\Observer\Notifications;

use SplSubject;
use SplObserver;

class NotifySubject implements SplSubject {

    protected array $observers = [];

    public function attach(SplObserver $observer): void {
        $observerId = $this->getObserverId($observer);
        $this->observers[$observerId] = $observer;
    }
   
    public function detach(SplObserver $observer): void {
        $observerId = $this->getObserverId($observer);

        if (isset($this->observers[$observerId])) {
            unset($this->observers[$observerId]);
        }
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    protected function getObserverId(SplObserver $observer): string {
        return get_class($observer);
    }
}