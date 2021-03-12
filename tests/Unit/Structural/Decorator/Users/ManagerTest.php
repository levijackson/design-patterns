<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Structural\Decorator\Users;

use PHPUnit\Framework\TestCase;
use levijackson\Pattern\Structural\Decorator\Users\User;
use levijackson\Pattern\Structural\Decorator\Users\Manager;
use levijackson\Pattern\Structural\Decorator\Users\Admin;

class ManagerTest extends TestCase {

    public function testGetInfo(): void {
        $name = 'Levi';
        $user = new User($name);
        $manager = new Manager($user);
        $expectedInfo  = $name . ' | Permissions: (User) (Manager)';
        
        $this->assertEquals($expectedInfo, $manager->getInfo());
    }

    public function testMultipleDecorators(): void {
        $name = 'Levi';
        $user = new User($name);
        $admin = new Admin($user);
        $manager = new Manager($admin);

        $expectedInfo  = $name . ' | Permissions: (User) (Admin) (Manager)';
        
        $this->assertEquals($expectedInfo, $manager->getInfo());
    }
    
}