<?php
require_once "UserManager.php";
require_once "User.php";
require_once "Logs.php";


class Validator{
  private array $users = [];
    public Log $log;

  public function __construct()
  {
    $this->log = new Log();
  }
  // Válidar se o email é valido - Larissa 
  public function validateEmail(string $email): ?string
  {
    if (empty($email)) {
      return $this->log->logError("Erro: Email Obrigatório");
    }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      return $this->log->logError("Erro: Email Invalido");
    }
    if (strlen($email) > 250) {
      return $this->log->logError("Erro: Email muito Longo");
    }
    return null;
  }

  public function emailExist(string $email): ?string
  {
    foreach ($this->users as $user) {
      if ($user['email'] === $email) {
          return $this->log->logError("Email já está em uso");
      }
    }
    return null;
  }

  // Validar se a senha é forte (min 8, maiuscula e minuscula) - Marcela
  public function validatePassword(string $password) : ?string 
  {
    if (empty($password)) {
      return $this->log->logError("Senha obrigatória");
    }
    if (strlen($password) < 8) {
      return $this->log->logError("Senha muito curta");
    }
    if (strlen($password) > 50) {
      return $this->log->logError("Senha muito longa");
    }
    if (!preg_match('/[0-9]/', $password)) {
      return $this->log->logError("Senha deve ter pelo menos um número");
    }
    if (!preg_match('/[a-z]/', $password)) {
      return $this->log->logError("Senha deve ter pelo menos uma letra minúscula");
    }
    if (!preg_match('/[A-Z]/', $password)) {
      return $this->log->logError("Senha deve ter pelo menos uma letra maiúscula");
    }
    return null;
  }

  // Gerar hash de senha com password_hash - Marcela 
  public function generateHash(string $password): string
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  // Comparar senha de login com senha cadastrada -  password_verify - Marcela
  public function comparePassword(string $password, string $hash) : ?string
  {
      $checkPassword = password_verify($password, $hash);

      if($checkPassword == true){
        return true;
      }
       
      return $this->log->logError("Senha incorreta");
  }

}
 
?>