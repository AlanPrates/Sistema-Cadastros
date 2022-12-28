CREATE TABLE alunos
(
cpf VARCHAR(15) PRIMARY KEY,
nome VARCHAR(50),
endereco VARCHAR(100),
telefone VARCHAR(20)
)

CREATE TABLE lista
(
idProduto int PRIMARY KEY auto_increment,
descricao VARCHAR(100),
aluno_cpf VARCHAR(25) REFERENCES alunos(cpf)
)

CREATE TABLE `alunos`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id`));

INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (1,'AlanSuper','123');
