# 📚 Sistema de Cadastros

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

Sistema web completo de cadastro e gestão de alunos, desenvolvido em PHP com MySQL. Projeto acadêmico da disciplina de Desenvolvimento Web do IFBA — Ilhéus.

## ✨ Funcionalidades

- ✅ Cadastro de alunos
- ✅ Listagem e pesquisa de alunos
- ✅ Edição de dados
- ✅ Remoção de registros
- ✅ Sistema de login com autenticação (usuário e admin)
- ✅ Painel administrativo separado
- ✅ Segurança contra SQL Injection
- ✅ Máscaras de campo com JavaScript

## 🛠️ Tecnologias

| Camada | Tecnologia |
|---|---|
| Backend | PHP |
| Banco de Dados | MySQL |
| Frontend | HTML, CSS, JavaScript |
| Segurança | Session, prepared statements |

## 📂 Estrutura do Projeto

```
Sistema-Cadastros/
├── Admin/           # Área administrativa
├── css/             # Estilos
├── js/              # Scripts JavaScript
├── index.php        # Página inicial
├── login.php        # Login de usuário
├── loginAdmin.php   # Login de administrador
├── painel.php       # Painel principal
├── aluno_*.php      # CRUD de alunos
└── conexao_bd.php   # Conexão com banco
```

## 🚀 Como rodar localmente

```bash
# 1. Clone o repositório
git clone https://github.com/AlanPrates/Sistema-Cadastros.git

# 2. Importe o banco de dados
# Abra o phpMyAdmin e importe o arquivo: 127_0_0_1.sql

# 3. Configure a conexão
# Edite conexao_bd.php com suas credenciais MySQL

# 4. Rode em um servidor local
# Use XAMPP, Laragon ou similar
```

## 🔗 Demo

🌐 [www.alanprates.com.br/webfinal/](https://www.alanprates.com.br/webfinal/)

---

<div align="center">
  <a href="https://github.com/AlanPrates">Feito por Alan Prates</a> •
  <a href="https://www.marketplaceprates.com.br">Marketplace Prates</a>
</div>
