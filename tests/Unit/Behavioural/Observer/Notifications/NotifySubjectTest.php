<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Behavioural\Observer\Notifications;

use levijackson\Pattern\Behavioural\Observer\Notifications\NotifySubject;
use levijackson\Pattern\Behavioural\Observer\Notifications\EmailObserver;
use levijackson\Pattern\Behavioural\Observer\Notifications\SlackObserver;

use PHPUnit\Framework\TestCase;

class NotifySubjectTest extends TestCase {

    public function testNotifications(): void {
        $subject = new NotifySubject();
        $emailObserver = new EmailObserver();
        $slackObserver = new SlackObserver();
        $subject->attach($emailObserver);
        $subject->attach($slackObserver);

        $subject->notify();

        $this->assertEquals(1, $emailObserver->getStatus());
        $this->assertEquals(1, $slackObserver->getStatus());
    }
}