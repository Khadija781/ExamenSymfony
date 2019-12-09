<?php

namespace App\Form\Model;

class ContactModel
{
	private $firstname;
	private $lastname;
	private $email;
	private $message;

	public function setFirstname(?string $firstname):void
	{
		$this->firstname = $firstname;
	}

	public function getFirstname():?string
	{
		return $this->firstname;
	}

	public function setLastname(?string $lastname):void
	{
		$this->lastname = $lastname;
	}

	public function getLastname():?string
	{
		return $this->lastname;
	}

	public function setEmail(?string $email):void
	{
		$this->email = $email;
	}

	public function getEmail():?string
	{
		return $this->email;
	}

	public function setMessage(?string $message):void
	{
		$this->message = $message;
	}

	public function getMessage():?string
	{
		return $this->message;
	}

}