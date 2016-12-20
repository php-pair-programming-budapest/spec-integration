<?php

namespace PPP\Phpspec;

final class UserRepositories
{
    /**
     * @var UserRepositoryAdapter
     */
    private $adapter;

    public function __construct(UserRepositoryAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function get($user)
    {
        return $this->adapter->get($user);
    }
}
