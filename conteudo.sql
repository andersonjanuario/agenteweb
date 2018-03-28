-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2018 às 22:43
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `agenteweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_acao_usuario`
--

CREATE TABLE `tb_agenteweb_acao_usuario` (
  `id` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `perfil` varchar(1) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenteweb_acao_usuario`
--

INSERT INTO `tb_agenteweb_acao_usuario` (`id`, `id_classe`, `id_usuario`, `perfil`, `status`) VALUES
(541, 33, 1, 'A', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_classe`
--

CREATE TABLE `tb_agenteweb_classe` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `controlador` varchar(255) DEFAULT NULL,
  `funcao` varchar(255) DEFAULT NULL,
  `secao` varchar(20) DEFAULT NULL,
  `id_modulo` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenteweb_classe`
--

INSERT INTO `tb_agenteweb_classe` (`id`, `nome`, `id_perfil`, `controlador`, `funcao`, `secao`, `id_modulo`, `status`) VALUES
(33, 'Template', 2, 'ControladorTemplate', 'telaListarTemplate', 'Template', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_login`
--

CREATE TABLE `tb_agenteweb_login` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenteweb_login`
--

INSERT INTO `tb_agenteweb_login` (`id`, `id_usuario`, `data`, `status`) VALUES
(1, 1, '2018-03-28 17:41:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_modulo`
--

CREATE TABLE `tb_agenteweb_modulo` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenteweb_modulo`
--

INSERT INTO `tb_agenteweb_modulo` (`id`, `nome`, `status`) VALUES
(8, 'SITE', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_pais`
--

CREATE TABLE `tb_agenteweb_pais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenteweb_pais`
--

INSERT INTO `tb_agenteweb_pais` (`id`, `nome`) VALUES
(1, 'Afeganistão'),
(2, 'Albânia'),
(3, 'Alemanha'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Anguilla'),
(7, 'Antigua e Barbuda'),
(8, 'Antilhas Holandesas'),
(9, 'Antártica'),
(10, 'Argentina'),
(11, 'Argélia'),
(12, 'Armênia'),
(13, 'Aruba'),
(14, 'Arábia Saudita'),
(15, 'Austrália'),
(16, 'Azerbaijão'),
(17, 'Brasil'),
(18, 'Bahamas'),
(19, 'Bahrein'),
(20, 'Bangladesh'),
(21, 'Barbados'),
(22, 'Belarus'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bolívia'),
(27, 'Botsuana'),
(28, 'Brunei'),
(29, 'Bulgária'),
(30, 'Burkina Faso'),
(31, 'Burundi'),
(32, 'Butão'),
(33, 'Bélgica'),
(34, 'Bósnia e Herzegovina'),
(35, 'Cabo Verde'),
(36, 'Camarões'),
(37, 'Camboja'),
(38, 'Canadá'),
(39, 'Cazaquistão'),
(40, 'Chade'),
(41, 'Chile'),
(42, 'China'),
(43, 'Chipre'),
(44, 'Cingapura'),
(45, 'Colômbia'),
(46, 'Congo'),
(47, 'Costa Rica'),
(48, 'Costa do Marfim'),
(49, 'Croácia'),
(50, 'Cuba'),
(51, 'Dinamarca'),
(52, 'Djibuti'),
(53, 'Dominica'),
(54, 'Egito'),
(55, 'El Salvador'),
(56, 'Emirados Árabes Unidos'),
(57, 'Equador'),
(58, 'Eritréia'),
(59, 'Eslováquia'),
(60, 'Eslovênia'),
(61, 'Espanha'),
(62, 'Estados Unidos'),
(63, 'Estônia'),
(64, 'Etiópia'),
(65, 'Fiji'),
(66, 'Filipinas'),
(67, 'Finlândia'),
(68, 'França'),
(69, 'Gabão'),
(70, 'Gana'),
(71, 'Geórgia'),
(72, 'Geórgia do Sul e Ilhas Sandwich do Sul'),
(73, 'Gibraltar'),
(74, 'Granada'),
(75, 'Groenlândia'),
(76, 'Grécia'),
(77, 'Guadalupe'),
(78, 'Guam'),
(79, 'Guatemala'),
(80, 'Guiana'),
(81, 'Guiana Francesa'),
(82, 'Guiné'),
(83, 'Guiné Equatorial'),
(84, 'Guiné-Bissau'),
(85, 'Gâmbia'),
(86, 'Haiti'),
(87, 'Holanda'),
(88, 'Honduras'),
(89, 'Hong Kong'),
(90, 'Hungria'),
(91, 'Ilha Bouvet'),
(92, 'Ilhas Cayman'),
(93, 'Ilhas Christmas'),
(94, 'Ilhas Cocos'),
(95, 'Ilhas Comores'),
(96, 'Ilhas Cook'),
(97, 'Ilhas Falkland (Malvinas)'),
(98, 'Ilhas Faroe'),
(99, 'Ilhas Heard e Mac Donalds'),
(100, 'Ilhas Marianas do Norte'),
(101, 'Ilhas Marshall'),
(102, 'Ilhas Norfolk'),
(103, 'Ilhas Pitcairn'),
(104, 'Ilhas Salomão'),
(105, 'Ilhas Turks e Caicos'),
(106, 'Ilhas Virgens (Britânicas)'),
(107, 'Ilhas Virgens Norte-Americanas'),
(108, 'Ilhas Wallis e Futuna'),
(109, 'Indonésia'),
(110, 'Iraque'),
(111, 'Irlanda'),
(112, 'Irã'),
(113, 'Islândia'),
(114, 'Israel'),
(115, 'Itália'),
(116, 'Iugoslávia'),
(117, 'Iêmen'),
(118, 'Jamaica'),
(119, 'Japão'),
(120, 'Jordânia'),
(121, 'Kiribati'),
(122, 'Kuait'),
(123, 'Laos'),
(124, 'Latvia'),
(125, 'Lesoto'),
(126, 'Libéria'),
(127, 'Liechtenstein'),
(128, 'Lituânia'),
(129, 'Luxemburgo'),
(130, 'Líbano'),
(131, 'Líbia'),
(132, 'Macau'),
(133, 'Macedônia'),
(134, 'Madagascar'),
(135, 'Maldivas'),
(136, 'Mali'),
(137, 'Malta'),
(138, 'Malásia'),
(139, 'Maláui'),
(140, 'Marrocos'),
(141, 'Martinica'),
(142, 'Mauritânia'),
(143, 'Maurício'),
(144, 'Mayotte'),
(145, 'Mianmar'),
(146, 'Micronésia'),
(147, 'Moldova'),
(148, 'Mongólia'),
(149, 'Montserrat'),
(150, 'Moçambique'),
(151, 'México'),
(152, 'Mônaco'),
(153, 'Namíbia'),
(154, 'Nauru'),
(155, 'Nepal'),
(156, 'Nicarágua'),
(157, 'Nigéria'),
(158, 'Niue'),
(159, 'Noruega'),
(160, 'Nova Caledônia'),
(161, 'Nova Zelândia'),
(162, 'Níger'),
(163, 'Omã'),
(164, 'Palau'),
(165, 'Panamá'),
(166, 'Papua Nova Guiné'),
(167, 'Paquistão'),
(168, 'Paraguai'),
(169, 'Peru'),
(170, 'Polinésia Francesa'),
(171, 'Polônia'),
(172, 'Porto Rico'),
(173, 'Portugal'),
(174, 'Qatar'),
(175, 'Quirguistão'),
(176, 'Quênia'),
(177, 'Reino Unido'),
(178, 'República Centro-Africana'),
(179, 'República Democrática da Coréia'),
(180, 'República Dominicana'),
(181, 'República Tcheca'),
(182, 'República da Coréia'),
(183, 'Reunião'),
(184, 'Romênia'),
(185, 'Ruanda'),
(186, 'Rússia'),
(187, 'Saara Ocidental'),
(188, 'Saint Kitts e Nevis'),
(189, 'Saint-Pierre e Miquelon'),
(190, 'Samoa'),
(191, 'Samoa Americana'),
(192, 'San Marino'),
(193, 'Santa Helena'),
(194, 'Santa Lúcia'),
(195, 'Senegal'),
(196, 'Serra Leoa'),
(197, 'Seychelles'),
(198, 'Somália'),
(199, 'Sri Lanka'),
(200, 'Suazilândia'),
(201, 'Sudão'),
(202, 'Suriname'),
(203, 'Suécia'),
(204, 'Suíça'),
(205, 'Svalbard'),
(206, 'São Tomé e Príncipe'),
(207, 'São Vicente e Grenadinas'),
(208, 'Síria'),
(209, 'Tadjiquistão'),
(210, 'Tailândia'),
(211, 'Taiwan'),
(212, 'Tanzânia'),
(213, 'Território Britânico do Oceano Índico'),
(214, 'Territórios Franceses do Sul'),
(215, 'Timor Leste'),
(216, 'Togo'),
(217, 'Tokelau'),
(218, 'Tonga'),
(219, 'Trinidad e Tobago'),
(220, 'Tunísia'),
(221, 'Turcomenistão'),
(222, 'Turquia'),
(223, 'Tuvalu'),
(224, 'Ucrânia'),
(225, 'Uganda'),
(226, 'Uruguai'),
(227, 'Usbequistão'),
(228, 'Vanuatu'),
(229, 'Vaticano'),
(230, 'Venezuela'),
(231, 'Vietnã'),
(232, 'Zaire'),
(233, 'Zimbábue'),
(234, 'Zâmbia'),
(235, 'África do Sul'),
(236, 'Áustria'),
(237, 'Índia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_template`
--

CREATE TABLE `tb_agenteweb_template` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sexo` char(1) NOT NULL,
  `estado_civil` char(1) DEFAULT NULL,
  `profissao` varchar(30) DEFAULT NULL,
  `faixa_salarial` double DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `identidade` varchar(15) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `telefone_residencial` varchar(14) DEFAULT NULL,
  `telefone_celular` varchar(14) DEFAULT NULL,
  `telefone_comercial` varchar(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenteweb_usuario`
--

CREATE TABLE `tb_agenteweb_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `id_perfil` int(11) NOT NULL COMMENT '1-Administrador e 2-usuario',
  `senha` varchar(256) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenteweb_usuario`
--

INSERT INTO `tb_agenteweb_usuario` (`id`, `nome`, `imagem`, `login`, `id_perfil`, `senha`, `status`) VALUES
(1, 'Administrador', '16142114.jpg', 'admin', 1, 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agenteweb_acao_usuario`
--
ALTER TABLE `tb_agenteweb_acao_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acao` (`id_classe`),
  ADD KEY `id_usuario_empresa` (`id_usuario`);

--
-- Indexes for table `tb_agenteweb_classe`
--
ALTER TABLE `tb_agenteweb_classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nome` (`nome`),
  ADD KEY `id_classe` (`id_modulo`);

--
-- Indexes for table `tb_agenteweb_login`
--
ALTER TABLE `tb_agenteweb_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `tb_agenteweb_modulo`
--
ALTER TABLE `tb_agenteweb_modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agenteweb_pais`
--
ALTER TABLE `tb_agenteweb_pais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agenteweb_template`
--
ALTER TABLE `tb_agenteweb_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indexes for table `tb_agenteweb_usuario`
--
ALTER TABLE `tb_agenteweb_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agenteweb_acao_usuario`
--
ALTER TABLE `tb_agenteweb_acao_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=547;

--
-- AUTO_INCREMENT for table `tb_agenteweb_classe`
--
ALTER TABLE `tb_agenteweb_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_agenteweb_login`
--
ALTER TABLE `tb_agenteweb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_agenteweb_modulo`
--
ALTER TABLE `tb_agenteweb_modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_agenteweb_pais`
--
ALTER TABLE `tb_agenteweb_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `tb_agenteweb_template`
--
ALTER TABLE `tb_agenteweb_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_agenteweb_usuario`
--
ALTER TABLE `tb_agenteweb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_agenteweb_acao_usuario`
--
ALTER TABLE `tb_agenteweb_acao_usuario`
  ADD CONSTRAINT `tb_agenteweb_acao_usuario_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `tb_agenteweb_classe` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_agenteweb_acao_usuario_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tb_agenteweb_usuario` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_agenteweb_classe`
--
ALTER TABLE `tb_agenteweb_classe`
  ADD CONSTRAINT `tb_agenteweb_classe_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tb_agenteweb_modulo` (`id`) ON UPDATE CASCADE;
COMMIT;
