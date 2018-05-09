-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 09-Maio-2018 às 03:52
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `altas_habilidades`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atendimento`
--

CREATE TABLE `tb_atendimento` (
  `cod_atendimento` int(11) NOT NULL,
  `cre` char(200) DEFAULT NULL,
  `itinerante` char(200) DEFAULT NULL,
  `dataAtendimento` char(10) DEFAULT NULL,
  `matriculaAluno` char(11) DEFAULT NULL,
  `nomeAluno` char(200) DEFAULT NULL,
  `dn` char(200) DEFAULT NULL,
  `escolaOrigem` char(200) DEFAULT NULL,
  `serie` char(20) DEFAULT NULL,
  `professor` char(200) DEFAULT NULL,
  `situacao` char(200) DEFAULT NULL,
  `diaSemana` char(200) DEFAULT NULL,
  `turno` char(20) DEFAULT NULL,
  `escolADEorigem` char(200) DEFAULT NULL,
  `telContato` char(15) DEFAULT NULL,
  `responsavel` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_atendimento`
--

INSERT INTO `tb_atendimento` (`cod_atendimento`, `cre`, `itinerante`, `dataAtendimento`, `matriculaAluno`, `nomeAluno`, `dn`, `escolaOrigem`, `serie`, `professor`, `situacao`, `diaSemana`, `turno`, `escolADEorigem`, `telContato`, `responsavel`) VALUES
(1, 'Taguatinga', 'Thiago', '06/12/2017', '110088', 'Guilherme Souza', NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Asa Norte', 'Thiago', '06/12/2017', '110077', 'Marcelo', NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Taguatinga', 'Thiago', '06/12/2017', '110044', 'Eduardo', '', '', '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_escola`
--

CREATE TABLE `tb_escola` (
  `codEscola` int(11) NOT NULL,
  `nomeEscola` char(200) NOT NULL,
  `cre` char(200) NOT NULL,
  `endereco` char(200) NOT NULL,
  `telefone` text NOT NULL,
  `latitude` char(200) DEFAULT NULL,
  `longitude` char(200) DEFAULT NULL,
  `descricao` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_escola`
--

INSERT INTO `tb_escola` (`codEscola`, `nomeEscola`, `cre`, `endereco`, `telefone`, `latitude`, `longitude`, `descricao`) VALUES
(1, 'Centro de Ensino Especial-01 de Taguatinga', 'Taguatinga', 'Taguatinga Centro', 'não', NULL, NULL, 'Na perspectiva da inclusão, a Educação Especial visa promover o direito de todos à educação. A Lei de Diretrizes e Bases da Educação Nacional – LDBEN.'),
(2, 'Escola Classe 111', 'Asa Sul', 'Brasília, Asa Norte, Quadra 111.', '6139012507', NULL, NULL, 'Nenhuma descrição');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ieducar`
--

CREATE TABLE `tb_ieducar` (
  `cod_ieducar` int(11) NOT NULL,
  `cod_aluno` int(11) NOT NULL,
  `escola_origem` char(200) NOT NULL,
  `ano` char(10) NOT NULL,
  `cadastrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_ieducar`
--

INSERT INTO `tb_ieducar` (`cod_ieducar`, `cod_aluno`, `escola_origem`, `ano`, `cadastrado`) VALUES
(1, 223344, 'CEF 202 Ceilândia', '5', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscricao`
--

CREATE TABLE `tb_inscricao` (
  `codinscricao` int(11) NOT NULL,
  `codAluno` int(11) DEFAULT NULL,
  `nomeAluno` char(200) DEFAULT NULL,
  `foto` char(200) DEFAULT NULL,
  `dataNascimento` char(10) DEFAULT NULL,
  `sexo` varchar(9) DEFAULT NULL,
  `idade` char(3) DEFAULT NULL,
  `atual` char(3) DEFAULT NULL,
  `anos` char(3) DEFAULT NULL,
  `escolaOrigem` char(200) DEFAULT NULL,
  `telefoneEscola` char(15) DEFAULT NULL,
  `cre` char(200) DEFAULT NULL,
  `serie` char(20) DEFAULT NULL,
  `turno` char(20) DEFAULT NULL,
  `enderecoResidencial` char(200) DEFAULT NULL,
  `telefone` char(15) DEFAULT NULL,
  `nomePai` char(200) DEFAULT NULL,
  `profissaoPai` char(200) DEFAULT NULL,
  `telefoneTrabPai` char(200) DEFAULT NULL,
  `celularPai` char(15) DEFAULT NULL,
  `emailPai` char(200) DEFAULT NULL,
  `nomeMae` char(200) DEFAULT NULL,
  `profissaoMae` char(200) DEFAULT NULL,
  `telefoneTrabMae` char(200) DEFAULT NULL,
  `celularMae` char(15) DEFAULT NULL,
  `emailMae` char(200) DEFAULT NULL,
  `inicioPeriodoObs` char(200) DEFAULT NULL,
  `devolutiva` char(200) DEFAULT NULL,
  `efetivado` char(200) DEFAULT NULL,
  `desligado` char(20) DEFAULT NULL,
  `motivo` char(20) DEFAULT NULL,
  `demanda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_inscricao`
--

INSERT INTO `tb_inscricao` (`codinscricao`, `codAluno`, `nomeAluno`, `foto`, `dataNascimento`, `sexo`, `idade`, `atual`, `anos`, `escolaOrigem`, `telefoneEscola`, `cre`, `serie`, `turno`, `enderecoResidencial`, `telefone`, `nomePai`, `profissaoPai`, `telefoneTrabPai`, `celularPai`, `emailPai`, `nomeMae`, `profissaoMae`, `telefoneTrabMae`, `celularMae`, `emailMae`, `inicioPeriodoObs`, `devolutiva`, `efetivado`, `desligado`, `motivo`, `demanda`) VALUES
(1, 110099, 'Shyane', 'img6.jpg', '25/12/2008', 'Feminino', '9', NULL, NULL, 'Centrão Taguatinga Centro', '6135432678', 'Taguatinga', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 110088, 'Guilherme Souza', 'não', '09/10/2007', 'Masculino', '10', NULL, '10', 'Centro de Ensino Médio 549', '61983453245', 'Taguatinga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 110077, 'Marcelo', '', '', NULL, '', NULL, '', NULL, '', 'Taguatinga', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 998877, 'Saulo Paulo', 'não', '27/12/2006', NULL, '11', NULL, 'onz', 'CEM 345 RA12', '6135426738', 'Gama', 'Oitava', 'Vespetino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 119988, 'Darlan Macena', '', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(6, 110066, 'Priscila Uber', 'img6.jpg', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(7, 110055, 'Janaina de Carvalho', 'img4.jpg', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(8, 110044, 'Eduardo', '', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(9, 110033, 'Janaina de Carvalho', 'img4.jpg', '', NULL, '', NULL, '', '', '', 'Asa Sul', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(10, 110022, '', '', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(11, 0, '', '', '', NULL, '', NULL, '', '', '', '', 'Escolher', 'Matutino', '', '', '', '', '', '', '', '', '', '', '', '', 'oi', '', '', '', '', 0),
(12, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(13, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(14, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(15, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(16, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(17, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(18, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(19, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(20, 0, '', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', 'Escolher', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(21, 0, 'Germano', 'trembala.jpg', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(22, 0, 'Germaldo', '03:49:30', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(23, 0, 'Germaldo', '03:50:37', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(24, 0, 'Germaldo', '03:51:46', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(25, 0, 'Germaldo', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(26, 0, 'Germaldo', '', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(27, 0, 'Tercivaldo', '03:56:23.jpg', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(28, 0, 'Tercivaldo', '03:58:58.jpg', 'Ano', NULL, '', NULL, '', 'Selecionar', '', 'Selecionar', '0', 'Selecionar', '', '', '', '', '', '', '', '', '', '', '', '', 'Dia', '', '', '', '', 0),
(29, 0, '', '02:29:03.jpg', '', NULL, '', NULL, '', '', '', 'Asa Sul', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(30, 0, '', '02:29:53.jpg', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(31, 0, '', '02:30:19.jpg', '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE `tb_professor` (
  `codProfessor` int(11) NOT NULL,
  `codEscola` int(11) DEFAULT NULL,
  `nomeProfessor` char(200) DEFAULT NULL,
  `especialidade` char(200) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `privilegio` varchar(100) NOT NULL,
  `matriculaProf` varchar(100) DEFAULT NULL,
  `formacao` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `grauEstudo` varchar(100) DEFAULT NULL,
  `dataAdmissao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`codProfessor`, `codEscola`, `nomeProfessor`, `especialidade`, `senha`, `privilegio`, `matriculaProf`, `formacao`, `area`, `grauEstudo`, `dataAdmissao`) VALUES
(1, 1, 'Thiago Xavier da Silva', 'Tecnologia da Informação', 'cpw2015@', 'itinerante', '11ee4400', 'Computação Licenciatura', 'Informática', 'Graduado', '11/03/2006'),
(2, 1, 'Juliane de Araújo', 'Autismo', '112233', 'sala_recurso', '1100ff44', 'Pedagogia', 'Aluno Especial', 'Graduação', '20/04/2009'),
(3, 999, 'Juliane de Araujo Santos', 'Regional', '162534', 'secretaria', '11220099', 'Pedagogia', 'Administrativa', 'Superior', '11/09/2002');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorio`
--

CREATE TABLE `tb_relatorio` (
  `cod_relatorio` int(11) NOT NULL,
  `cod_gerador` int(11) DEFAULT NULL,
  `chave` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_atendimento`
--
ALTER TABLE `tb_atendimento`
  ADD PRIMARY KEY (`cod_atendimento`);

--
-- Indexes for table `tb_escola`
--
ALTER TABLE `tb_escola`
  ADD PRIMARY KEY (`codEscola`);

--
-- Indexes for table `tb_ieducar`
--
ALTER TABLE `tb_ieducar`
  ADD PRIMARY KEY (`cod_ieducar`);

--
-- Indexes for table `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  ADD PRIMARY KEY (`codinscricao`);

--
-- Indexes for table `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`codProfessor`);

--
-- Indexes for table `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  ADD PRIMARY KEY (`cod_relatorio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_atendimento`
--
ALTER TABLE `tb_atendimento`
  MODIFY `cod_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_escola`
--
ALTER TABLE `tb_escola`
  MODIFY `codEscola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  MODIFY `codinscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
