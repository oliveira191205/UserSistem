<?php
require_once "User.php";
require_once "Validator.php";
require_once "Logs.php";

class UserManager
{
  private Validator $validator;
  private array $users = [];
  public Log $log;

  public function __construct()
  {
    $this->validator = new Validator();
    $this->log = new Log();
  }
  //Cadastro de usuário - Larissa
  public function createUser(User $user): ?string 
  {
    $erro = $this->validator->validateEmail($user->getEmail());
    if ($erro){
      return $erro;
    } 

    $erro = $this->validator->validatePassword($user->getPassword());
    if ($erro){
      return $erro;
    } 

    $erro = $this->validator->emailExist($user->getEmail()); 
    if ($erro){
      return $erro;
    } 

    $hash = $this->validator->generateHash($user->getPassword());
    $user->setPasswordHash($hash);

    $this->users[] = $user;

    return $this->log->logSucess("Usuário {$user->getUsername()} cadastrado com sucesso!");
  }

  // login de usuário - Larissa
  public function userLogin(string $email, string $password): ?string 
  {
    $storedPasswordHash = $this->getPasswordHashByEmail($email);

    if (!$storedPasswordHash) {
        return $this->log->logError("Usuário não encontrado");
    }

    if (password_verify($password, $storedPasswordHash)) {
        return $this->log->logSucess("Login realizado com sucesso!");
    }

    return $this->log->logError("Senha incorreta");
}

public function getPasswordHashByEmail(string $email): ?string
{
    foreach ($this->users as $user) {
      if ($user->getEmail() === $email) {
          return $user->getPasswordHash(); // ou getPassword(), depende da sua classe User
      }
    }
    return null; 
}  
  // Atualizar senha (validar novamente) - Marcela
  public function updatePassword(User $user, string $newPassword): ? string
  {
    $validate = $this->validator->validatePassword($newPassword);
    if ($validate !== null) {
      return $validate;
    }
    
    $newHash = $this->validator->generateHash($newPassword);
    $user->setPasswordHash($newHash);

        // atualizar também no array interno
    foreach ($this->users as &$u) {
      if ($u->getEmail() === $user->getEmail()) {
        $u->setPasswordHash($newHash);
        break;
      }
    }
    
    return $this->log->logSucess("Senha atualizada com sucesso!");
  }   

}


?>