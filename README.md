# Sistema de Cadastros

## Descricao
Sistema web simples para cadastro, listagem, pesquisa, edicao e remocao de alunos. O projeto usa PHP com MySQL/MariaDB e possui telas publicas, autenticacao de administrador e paginas protegidas para gerenciamento dos dados.

## Tecnologias Utilizadas
- PHP
- MySQL/MariaDB
- HTML
- CSS
- JavaScript
- Servidor local como XAMPP, WAMP ou MAMP

## Estrutura de Pastas
```text
Sistema-Cadastros/
|-- public/
|   |-- index.php
|   |-- login.php
|   |-- loginAdmin.php
|   |-- logout.php
|   `-- painel.php
|-- src/
|   |-- admin/
|   |   `-- Admin.php
|   |-- aluno/
|   |   |-- aluno_cadastrar.php
|   |   |-- aluno_cadastrar_salvar.php
|   |   |-- aluno_editar.php
|   |   |-- aluno_editar_salvar.php
|   |   |-- aluno_listar.php
|   |   |-- aluno_pesquisar.php
|   |   `-- aluno_remover.php
|   |-- auth/
|   |   `-- verifica_login.php
|   `-- config/
|       `-- conexao_bd.php
|-- assets/
|   |-- css/
|   |   |-- bootstrap*.css
|   |   |-- bootstrap*.css.map
|   |   |-- style.css
|   |   `-- style-form.css
|   `-- js/
|       |-- bootstrap*.js
|       |-- bootstrap*.js.map
|       `-- mascaras.js
|-- database/
|   |-- 127_0_0_1.sql
|   `-- sqlEmpresa.sql
|-- docs/
|   `-- estrutura.md
|-- Admin/
|-- css/
|-- js/
|-- nbproject/
|-- README.md
|-- .gitignore
`-- arquivos PHP de compatibilidade na raiz
```

## Mapa dos Arquivos
| Arquivo | Funcao | Observacoes |
|--------|--------|-------------|
| public/index.php | Pagina inicial | Entrada publica principal do sistema |
| public/loginAdmin.php | Tela de login | Formulario de acesso administrativo |
| public/login.php | Processa login | Usa `src/config/conexao_bd.php` e redireciona para o admin |
| public/logout.php | Encerra sessao | Destroi a sessao e volta para a pagina inicial |
| public/painel.php | Painel alternativo | Mantido por existir no projeto original; requer login |
| src/admin/Admin.php | Painel administrativo | Requer login e aponta para as telas de alunos |
| src/auth/verifica_login.php | Verificacao de sessao | Protege paginas administrativas e de aluno |
| src/config/conexao_bd.php | Conexao com banco | Centraliza credenciais e funcoes MySQLi |
| src/aluno/aluno_cadastrar.php | Formulario de cadastro | Usa mascara JavaScript |
| src/aluno/aluno_cadastrar_salvar.php | Salva cadastro | Requer login e grava no banco |
| src/aluno/aluno_listar.php | Lista alunos cadastrados | Requer login |
| src/aluno/aluno_pesquisar.php | Pesquisa aluno por CPF | Requer login |
| src/aluno/aluno_editar.php | Formulario de edicao | Requer login e carrega dados por CPF |
| src/aluno/aluno_editar_salvar.php | Salva alteracoes | Requer login e atualiza o banco |
| src/aluno/aluno_remover.php | Remove aluno | Requer login e remove por CPF |
| assets/css/style.css | Estilos principais | Veio de `css/style.css` |
| assets/css/style-form.css | Estilo antigo de formulario | Veio de `style.css` da raiz e foi preservado |
| assets/css/bootstrap*.css | Bootstrap | Arquivos movidos da pasta `css/` |
| assets/js/bootstrap*.js | Bootstrap JS | Arquivos movidos da pasta `js/` |
| assets/js/mascaras.js | Mascaras de formulario | Usado no cadastro e pesquisa |
| database/127_0_0_1.sql | Dump principal do banco | Importar pelo phpMyAdmin |
| database/sqlEmpresa.sql | SQL adicional | Veio da pasta `Admin/` |
| docs/estrutura.md | Documentacao da organizacao | Explica pastas e compatibilidade |
| arquivos PHP na raiz | Compatibilidade | Redirecionam para `public/` ou `src/` |
| conexao_bd.php na raiz | Compatibilidade | Inclui `src/config/conexao_bd.php` |
| verifica_login.php na raiz | Compatibilidade | Inclui `src/auth/verifica_login.php` |

## Fluxo do Sistema
1. Usuario acessa `public/index.php` ou a raiz do projeto.
2. Usuario abre `public/loginAdmin.php`.
3. O formulario envia dados para `public/login.php`.
4. O sistema valida usuario e senha no banco.
5. Usuario autenticado acessa `src/admin/Admin.php`.
6. Usuario cadastra, lista, pesquisa, edita ou remove alunos.
7. Usuario faz logout por `public/logout.php`.

## Banco de Dados
O dump principal esta em:

```text
database/127_0_0_1.sql
```

Para importar pelo phpMyAdmin:
1. Inicie Apache e MySQL no XAMPP, WAMP ou MAMP.
2. Acesse o phpMyAdmin.
3. Crie o banco com o nome esperado em `src/config/conexao_bd.php`.
4. Abra a aba Importar.
5. Selecione `database/127_0_0_1.sql`.
6. Execute a importacao.

## Como Rodar o Projeto
1. Copie a pasta `Sistema-Cadastros` para `htdocs` ou equivalente.
2. Inicie Apache e MySQL.
3. Crie/importe o banco de dados pelo phpMyAdmin.
4. Ajuste os dados de conexao em `src/config/conexao_bd.php`.
5. Acesse pelo navegador:

```text
http://localhost/Sistema-Cadastros/
```

A raiz redireciona para `public/index.php`.

## Configuracao do Banco
Confira em `src/config/conexao_bd.php`:
- host em `$servidor`
- usuario em `$usuario`
- senha em `$senha`
- nome do banco em `$bd`
- porta, se o ambiente local exigir configuracao adicional

## Paginas Principais
- `public/index.php`
- `public/loginAdmin.php`
- `public/login.php`
- `public/logout.php`
- `src/admin/Admin.php`
- `src/aluno/aluno_cadastrar.php`
- `src/aluno/aluno_listar.php`
- `src/aluno/aluno_pesquisar.php`
- `src/aluno/aluno_editar.php`
- `src/aluno/aluno_remover.php`

## Autenticacao
O login e processado em `public/login.php`. Quando as credenciais sao validas, o sistema grava `$_SESSION['usuario']` e redireciona para `src/admin/Admin.php`.

As paginas administrativas e a maior parte das paginas de aluno usam `src/auth/verifica_login.php`, que verifica a sessao e redireciona para `public/index.php` quando nao ha usuario autenticado.

O logout esta em `public/logout.php`, chama `session_destroy()` e retorna para a pagina inicial.

## Observacoes
- Os arquivos principais foram reorganizados na nova estrutura.
- Os arquivos PHP antigos foram mantidos na raiz como wrappers de compatibilidade para URLs antigas.
- `conexao_bd.php` e `verifica_login.php` tambem ficaram na raiz como wrappers para includes antigos.
- `css/`, `js/` e `Admin/` podem permanecer vazias no disco por compatibilidade/local history; os assets usados agora estao em `assets/`.
- O arquivo `style.css` antigo da raiz foi preservado em `assets/css/style-form.css`; o estilo principal atual esta em `assets/css/style.css`.
- A logica principal do sistema foi preservada. Foram ajustados apenas caminhos, includes, assets, formularios e redirecionamentos necessarios.

## Proximos Melhoramentos
- Usar PDO.
- Separar layout em header/footer.
- Criar sistema MVC simples.
- Melhorar validacao dos formularios.
- Proteger contra SQL Injection com prepared statements.
- Usar senhas com `password_hash`.
- Criar mensagens de erro e sucesso padronizadas.
