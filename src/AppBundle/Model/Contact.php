<?php

namespace AppBundle\Model;

class Contact
{
    /**
     * Email
     * @var string
     */
    protected $email;

    /**
     * Subject
     * @var string
     */
    protected $subject;

    /**
     * Content
     * @var string
     */
    protected $content;

    public function getEmail()
    {
      return $this->email;
    }

    public function setEmail($email)
    {
      $this->email = $email;
    }

    public function getSubject()
    {
      return $this->subject;
    }

    public function setSubject($subject)
    {
      $this->subject = $subject;
    }

    public function getContent()
    {
      return $this->content;
    }

    public function setContent($content)
    {
      $this->content = $content;
    }
}
