# Sistema De Gerenciamento De Veiculos
Sistema de Gerenciamento de Veículos, Projeto de Fullstack com padrão MVC implementado e autenticação com session_start().

## Componentes da Equipe:

* Érica Paixão Gois: FrontEnd com a criação das interfaces com HTML, CSS e JS.

* Miqueias Silva Santos: BackEnd conexão com BD, Cadastro dos Dados.

* Rodrigo Pereira Faria: BackEnd Implementação do padrão MVC, roteamento e Autenticação, Documentação e Cenários de Teste.

## Como executar projeto:

* Pré-requisitos:

Tenha o xampp instalado na máquina.

1. Clone a pasta do projeto. Coloque o nome exato dela de "sistema-gerenciamento-veiculos"

2. Após clonar a pasta, inicie o xampp com o Apache e o MySQL

3. Abra a pasta do projeto e execute a consulta iniciar-bd da pasta sql

4. Acesse http://localhost/sistema-gerenciamento-veiculos e selecione public/

5. Aqui a aplicação se inicia, ela vai te direcionar para a tela de login.

6. Digite seu email e sua senha para entrar na plataforma (email: anderson@gmail.com, senha: 12345678 (foi criptografada para o BD))

## Funcionalidades:

### Login

Concede autorização do usuário para acessar a aplicação. Realizado com $_SESSION[] e conexão com Banco de dados em PDO. Interface em HTML, CSS e JS.

### Cadastro dos Veículos

Cadastrar veículos inserindo dados em um formulário criado em HTML, CSS e JS. O cadastro é feito através do método POST passando pelo VeiculoControladora executando o método CadastrarNovoVeículo através da rota veiculo/cadastrar (visualizar Rotas na pasta app/Routes/Rotas.php).

### Visualização dos Veículos Cadastrados

Com Veículos cadastrados, você pode verificar se há veículos para serem exibidos com a visualização. A VeiculoControladora envia os dados do banco de dados exibindo em linhas de uma tabela através de um foreach. É acessado pela rota veiculos/.

Possibilita acessar outras três funcionalidades: veiculo/atualizar/id, veiculo/id/ (visualizar único), veiculo/deletar.

### Atualizar Veículos

Recebendo os dados passados na tabela, exibe nos placeholders os dados antigos do veículo (obs: não mantém os mesmos dados de antes a menos que você os digite novamente). Assim, insira no formulário os novos dados do veículo para alterar suas informações.

### Remover Veículos

Apertando no botão de deletar, deletar o veículo a partir do método deletar da Veículo controladora (rota veiculo/deletar) e exibe a tela inicial novamente.

### Visualizar único veículo

Apertando em visualizar na tabela, isola o veículo escolhido para ser visualizado (utiliza o id vindo da tabela passado na rota).

### Fazer Logout

Derruba a sessão de Login e protege a entrada do site, impedindo que pessoas sem autenticação acessem as rotas protegidas do site.

### Análise de URL do Sistema

A URL amigável do sistema é criada a partir do roteamento dos conteúdos, em app/Routes/Rotas.php, a definição de um sistema de divisão de rotas, localizado em app/Core/App.php e a configuração do servidor apache para evitar rotas desconhecidas no arquivo .htaccess.


