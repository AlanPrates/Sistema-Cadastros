
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `alunos` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `datanascimento` varchar(20) DEFAULT NULL,
  `mae` varchar(50) DEFAULT NULL,
  `pai` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `turma` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `alunos` (`cpf`, `nome`, `matricula`, `cep`, `endereco`, `datanascimento`, `mae`, `pai`, `telefone`, `turma`) VALUES
('033.084.005-37', 'João Alves Daciolo', '20211STI0006', '47665-325', 'Rua Canelinha', '10/07/1989', 'Joana das Caldas', 'Pedro o Grande da União Soviética', '(73) 9916-36180', 'ST131');



CREATE TABLE `lista` (
  `idProduto` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `aluno_cpf` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `tarefa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feito` int(50) NOT NULL DEFAULT 1,
  `data_tarefa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`) VALUES
(1, 'AlanSuper', '202cb962ac59075b964b07152d234b70');


ALTER TABLE `lista`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lista`
--
ALTER TABLE `lista`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
