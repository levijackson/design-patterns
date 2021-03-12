<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Structural\Decorator\Users;

use PHPUnit\Framework\TestCase;
use levijackson\Pattern\Structural\Decorator\Users\User;

class UserTest extends TestCase {

    public function testGetInfo(): void {
        $name = 'Levi';
        $account = new User($name);
        $expectedInfo  = $name . ' | Permissions: (User)';
        
        $this->assertEquals($expectedInfo, $account->getInfo());
    }
    
}