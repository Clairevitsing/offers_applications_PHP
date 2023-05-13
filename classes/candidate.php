<?php


namespace App;

use DateTime;


class candidate
{
    private string $application_date;
    private string $name;
    private string $firstname;
    private string $email;
    private string $cv;
    private int $offer_Id;

    public function __construct(string $application_date, string $name, string $firstname, string $email, string $cv, int $offer_Id)
    {
        $this->application_date = $application_date;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->cv = $cv;
        $this->offer_Id = $offer_Id;
    }

    public function getApplication_date(): string
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

    public function getOffer_Id()
    {
        return $this->offer_Id;
    }
}
