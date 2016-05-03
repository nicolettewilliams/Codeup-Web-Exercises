<?php

class Person
{
    public $firstName;
    public $lastName;

    public function __construct()
    {
        echo 'A perosn has been created';
    }
}

$isaac = new Person();
$niki = new Person();
$natalie = new Person();
