# Estrutura do Projeto

O projeto foi organizado em pastas por responsabilidade:

| Pasta | Responsabilidade |
|------|------------------|
| `public/` | Paginas publicas e fluxo de entrada, login e logout |
| `src/config/` | Configuracoes e conexao com banco |
| `src/auth/` | Verificacao de autenticacao |
| `src/admin/` | Painel administrativo |
| `src/aluno/` | CRUD de alunos |
| `assets/css/` | CSS do projeto e Bootstrap |
| `assets/js/` | JavaScript do projeto e Bootstrap |
| `database/` | Arquivos SQL |
| `docs/` | Documentacao complementar |

## Compatibilidade

Os arquivos PHP antigos da raiz foram mantidos como wrappers. Eles redirecionam para os novos locais ou incluem os arquivos novos quando sao usados como dependencia PHP.

Isso permite que URLs antigas como `aluno_listar.php` ou `Admin.php` continuem funcionando enquanto o projeto passa a usar a estrutura organizada.

## Caminhos Ajustados

- Includes de banco: `src/config/conexao_bd.php`
- Includes de sessao: `src/auth/verifica_login.php`
- CSS principal: `assets/css/style.css`
- Bootstrap CSS: `assets/css/bootstrap.min.css`
- Bootstrap JS: `assets/js/bootstrap.min.js`
- Mascaras JS: `assets/js/mascaras.js`
- Painel admin: `src/admin/Admin.php`
- Paginas de aluno: `src/aluno/`
