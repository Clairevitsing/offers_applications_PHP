<?php

namespace App;

use DateTime;

class candidate
{
    private string $name;
    private string $firstname;
    private string $email;
    private string $cv;
    private DateTime $application_date;

    public function __construct(DateTime $application_date, string $name, string $firstname, ?string $email = "", ?string $cv = "")
    {
        $this->application_date->$application_date;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->cv = $cv;
    }

    public function getApplication_date(): DateTime
    {
        return $this->application_date;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getCv()
    {
        return $this->cv;
    }
}
