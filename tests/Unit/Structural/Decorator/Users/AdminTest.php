<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Structural\Decorator\Users;

use PHPUnit\Framework\TestCase;
use levijackson\Pattern\Structural\Decorator\Users\User;
use levijackson\Pattern\Structural\Decorator\Users\Admin;

class AdminTest extends TestCase {

    public function testGetInfo(): void {
        $name = 'Levi';
        $user = new User($name);
        $admin = new Admin($user);
        $expectedInfo  = $name . ' | Permissions: (User) (Admin)';
        
        $this->assertEquals($expectedInfo, $admin->getInfo());
    }
    
}