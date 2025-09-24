<?php 
  class User{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(int $id, string $name, string $email, string $password)
    {
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->password = $password; 
    }

    public function getUsername() : string
    {
     return $this->name;
    }
    public function getEmail() : string
    {
     return $this->email;
    }
    public function getPassword() : string
    {
     return $this->password;
    }
    

    // atualiza a senha 
    public function setPassword(string $newHash): void
    {
      $this->password = $newHash;
    }
    
    public function getPasswordHash(): string
    {
        return $this->password;
    }

    public function setPasswordHash(string $newHash): void 
    {
        $this->password = $newHash;
    }
 }
 


?>