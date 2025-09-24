<?php
require_once 'User.php';
require_once 'UserManager.php';
require_once 'Validator.php';

echo "Sistema de usuários";

$userManager = new UserManager();

$user = new User(1, "João Silva", "joao@test.com", "Senha123");

$result1 = $userManager->createUser($user);
echo "<p>Cadastrar usuário : {$result1}</p>";

$result2 = $userManager->updatePassword($user, "Senha234");
echo "<p>Atualizar Senha: {$result2}</p>";

$result3 = $userManager->userLogin("joao@test.com", "Senha123");
echo "<p>Login (senha antiga): {$result3}</p>";

$result4 = $userManager->userLogin("joao@test.com", "Senha234");
echo "<p>Login (senha nova): {$result4}</p>";

// Logs 
if (method_exists($userManager, "getLogs")) {
    echo "<h3>Logs:</h3>";
    $logs = $validator->getLogs();
    echo "<ul>";
    foreach ($logs as $log) {
        echo "<li>{$log}</li>";
    }
    echo "</ul>";
}
?>
