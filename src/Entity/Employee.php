<?php

namespace App\Entity;

class Employee
{
    /**
     * @var string
     */
    private $uuid;
    /**
     * @var string
     */
    private $company;
    /**
     * @var string
     */
    private $bio;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $avatar;

    public function __construct($uuid, $company, $bio, $name, $title, $avatar)
    {
        $this->uuid = $uuid;
        $this->company = $company;
        $this->bio = $bio;
        $this->name = $name;
        $this->title = $title;
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getBio(): string
    {
        return $this->bio;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
