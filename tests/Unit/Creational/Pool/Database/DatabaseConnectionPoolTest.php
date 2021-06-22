<?php

declare(strict_types=1);

namespace levijackson\Pattern\Tests\Unit\Creational\Pool\Database;

use PHPUnit\Framework\TestCase;
use levijackson\Pattern\Creational\Pool\Database\DatabaseConnection;
use levijackson\Pattern\Creational\Pool\Database\DatabaseConnectionPool;

class DatabaseConnectionPoolTest extends TestCase
{
    public function testGetNewConnection(): void {
        $pool = new DatabaseConnectionPool();
        $connection1 = $pool->getConnection();
        $connection2 = $pool->getConnection();

        $this->assertInstanceof(DatabaseConnection::class, $connection1);
        $this->assertInstanceof(DatabaseConnection::class, $connection2);

        $this->assertCount(2, $pool->getActiveConnections());
        $this->assertCount(0, $pool->getFreeConnections());
    }

    public function testReleaseConnection(): void {
        $pool = new DatabaseConnectionPool();
        $connection1 = $pool->getConnection();
        $connection2 = $pool->getConnection();

        $pool->releaseConnection($connection1);

        $this->assertCount(1, $pool->getActiveConnections());
        $this->assertCount(1, $pool->getFreeConnections());
    }

    public function testReleaseNonExistantConnection(): void {
        $pool = new DatabaseConnectionPool();

        $this->assertCount(0, $pool->getActiveConnections());
        $this->assertCount(0, $pool->getFreeConnections());

        $connection = new DatabaseConnection();
        $pool->releaseConnection($connection);

        $this->assertCount(0, $pool->getActiveConnections());
        $this->assertCount(1, $pool->getFreeConnections());
    }
}
