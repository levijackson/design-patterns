<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Behavioural\Observer\Notifications;

use levijackson\Pattern\Behavioural\Observer\Notifications\NotifySubject;
use levijackson\Pattern\Behavioural\Observer\Notifications\BaseObserver;
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

        $this->assertEquals(BaseObserver::STATUS_NOT_SENT, $emailObserver->getStatus());
        $this->assertEquals(BaseObserver::STATUS_NOT_SENT, $slackObserver->getStatus());

        $subject->notify();

        $this->assertEquals(BaseObserver::STATUS_SENT, $emailObserver->getStatus());
        $this->assertEquals(BaseObserver::STATUS_SENT, $slackObserver->getStatus());
    }

    public function testRemoveNotifications(): void {
        $subject = new NotifySubject();
        $emailObserver = new EmailObserver();
        $slackObserver = new SlackObserver();
        $subject->attach($emailObserver);
        $subject->attach($slackObserver);

        $this->assertEquals(BaseObserver::STATUS_NOT_SENT, $emailObserver->getStatus());
        $this->assertEquals(BaseObserver::STATUS_NOT_SENT, $slackObserver->getStatus());
        $subject->detach($emailObserver);

        $subject->notify();

        $this->assertEquals(BaseObserver::STATUS_NOT_SENT, $emailObserver->getStatus());
        $this->assertEquals(BaseObserver::STATUS_SENT, $slackObserver->getStatus());
    }
}