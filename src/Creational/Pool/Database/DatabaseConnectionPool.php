<?php

declare(strict_types=1);

namespace levijackson\Pattern\Creational\Pool\Database;

class DatabaseConnectionPool{
    
    private array $activeConnections = [];
    private array $freeConnections = [];

    /**
     * Get an existing connection, or create a new one
     *
     * @return DatabaseConnection
     */
    public function getConnection(): DatabaseConnection {
        if (count($this->freeConnections) > 0) {
            $connection = array_pop($this->freeConnections);
        } else {
            $connection = new DatabaseConnection();
        }

        $this->activeConnections[$this->getConnectionId($connection)] = $connection;
    
        return $connection;
    }

    /**
     * Put a connection back into the pool to be used by something else
     *
     * @param DatabaseConnection $connection
     * @return boolean
     */
    public function releaseConnection(DatabaseConnection $connection): void {
        $key = $this->getConnectionId($connection);
        if (isset($this->activeConnections[$key])) {
            unset($this->activeConnections[$key]);
        }
        $this->freeConnections[$key] = $connection;
    }

    /**
     * Get a unique string to reference the connection by
     *
     * @param DatabaseConnection $connection
     * @return string
     */
    private function getConnectionId(DatabaseConnection $connection): string {
        return spl_object_hash($connection);
    }

    // Used for tests
    public function getActiveConnections(): array {
        return $this->activeConnections;
    }

    // Used for tests
    public function getFreeConnections(): array {
        return $this->freeConnections;
    }
}