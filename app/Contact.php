<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'inquiry', 'message'];

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $phone;

    /**
     * @var string|null
     */
    private $inquiry;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Contact
     */
    public function setName(string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Contact
     */
    public function setPhone(int $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInquiry(): ?string
    {
        return $this->inquiry;
    }

    /**
     * @param string|null $inquiry
     * @return Contact
     */
    public function setInquiry(?string $inquiry): Contact
    {
        $this->inquiry = $inquiry;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

}
