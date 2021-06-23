<?php

declare(strict_types=1);

namespace levijackson\Pattern\Creational\Pool\Database;

class DatabaseConnection{
    
    protected string $host;
    protected string $port;
    protected string $username;
    protected string $password;
    
    public function __construct(
        string $host = 'localhost',
        string $port = '3306',
        string $username = 'user',
        string $password = 'password'
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }
}