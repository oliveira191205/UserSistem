# User and Identification System
User and Identification System diz respeito a um sistema que simula o cadastro, o login e alteração de senhas de usuário.  
Desenvolvido por:
- *Larissa Vitória Custódio de Carvalho RA: 1995354*
- *Marcela Buzzo de Oliveira RA: 2014340*
## Funcionalidades do Sistema
O sistema simula todo o funcionamento de cadastro e login de usuário, com as mais diversas funcionalidades comumente usada no mesmo. Dentre as funcionalidades estão:<br>
- #### Lista de Usuários
  A funcionalidade como o nome sugere, gera uma lista de todos os usuários cadastrados no sistema, com seus atributos: Id, Nome, Email e Senha(com hash gerado para segurança).
- #### Cadastro de Usuário
  A funcionalidade é responsável por cadastrar os usuários que ficam armazenados em um array, no entanto para isso passar pelas as validações de email, senha e gera um hash para proteger a senha casos as validações sejam aprovadas.
- #### Login de Usuário
  A funcionalidade serve para simular o login de um usuário validado se a senha e o email fornecidos correspondem com algum usuário cadastrados.
- #### Reset de Senha
  A funcionalidade serve para a alteração de senha de um usuário já cadastrado, para isso verifica se a nova senha atende as requisitos, de, possuir ao menos um número, um letra minúscula e uma letra maiúscula, se passar pela validação, atualiza a senha do usuário.
<br>
As funcionalidades apresentadas são úteis e se relacionam de determinada forma com os usuários e com os desenvolvedores, 
as próximas funcionalidades apresentadas estão mais focadas para o desenvolvedor e a melhor organização do sistema em si, não se relacionando diretamente com o usuário.
- ### Validação de email
  Para o email ser validado ele realmente precisa inserir um email que realmente atenda os pré-requisitos de um endereço de email, onde a validação é feita usando a função já existente em PHP, 'FILTER_VALIDATE_EMAIL'.
- ### Tentativa de login com senha errada
  Como o sistema funciona realmente como um sistema de login, não pode deixar que uma conta de usuário seja acessada com uma senha incorreta, dessa forma, a funcionalidade verifica se as credenciais inseridas estão corretas as comparando com as credenciais dos usuários já armazenadas.
- ### Validação de senha
   Para o usuário ser criado, bem como sua ser atualizada ela precisa passar por alguns requisitos para ser considerada forte (possuir ao menos um número, uma letra minúscula e uma maiúscula) e só assim será permitido a criação de um usuário ou a alteração de senha. 
- ### Email em uso
  Não queremos que o sistema tenha dois ou mais usuários com o mesmo email, dessa forma a funcionalidade verifica se o email inserido para a criação de um usuário já não está em uso por algum usuário já cadastrado, caso já esteja o cadastro não é aprovado.
- #### Funções de Log
  As funções de Log são funções simples e padrões que serve para retornos de funções informando ao usuário se a ação foi realizada com sucesso ou se deu erro informando o erro.

## Como rodar o projeto
```
1.Certifique-se de ter o Xampp e o Apache instalados na máquina;
2.Baixe a pasta 'User and Identification System' completa na sua máquina;
3.Descompactue e extraia a pasta;
4.Coloque a pasta descompactada dentro de 'C:\xampp\htdocs\';
5.Para rodar o projeto, abra o navegador e digite 'https://localhost/index'.
```




