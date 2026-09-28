<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Handlers\DatabaseHandler;

class Session extends BaseConfig
{
    /**
     * Menggunakan DatabaseHandler agar tidak bergantung pada folder writable
     */
    public string $driver = DatabaseHandler::class;

    public string $cookieName = 'ci_session';

    public int $expiration = 7200;

    /**
     * Nama tabel session di database
     */
    public string $savePath = 'ci_sessions';

    public bool $matchIP = false;

    public int $timeToUpdate = 300;

    public bool $regenerateDestroy = false;

    public ?string $DBGroup = 'default';

    public int $lockRetryInterval = 100_000;

    public int $lockMaxRetries = 300;
}