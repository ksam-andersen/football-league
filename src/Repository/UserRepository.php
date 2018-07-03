<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param $username
     *
     * @return User|null
     */
    public function findByUsername($username)
    {
        return $this->findOneBy(['username' => $username]);
    }

    /**
     * @param $authKey
     *
     * @return User|null
     */
    public function findByAuthKey($authKey)
    {
        return $this->findOneBy(['authKey' => $authKey]);
    }

    /**
     * @param $token
     *
     * @return User|null
     */
    public function findByJwt($token)
    {
        return $this->findByAuthKey(sha1($token));
    }
}
