<?php

class User
{

  function __construct(
    public int $id,
    public string $name,
    public string $username,
    public string $email,
    public string $phone,
    public string $website
  ) {
  }
}
