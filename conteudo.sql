-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Ago-2015 às 01:36
-- Versão do servidor: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conteudo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo_acao_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_acao_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_classe` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `perfil` varchar(1) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_acao` (`id_classe`),
  KEY `id_usuario_empresa` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=547 ;

--
-- Extraindo dados da tabela `tb_conteudo_acao_usuario`
--

INSERT INTO `tb_conteudo_acao_usuario` (`id`, `id_classe`, `id_usuario`, `perfil`, `status`) VALUES
(538, 33, 8, 'A', 1),
(539, 34, 8, 'A', 0),
(540, 35, 8, 'A', 0),
(541, 33, 1, 'A', 1),
(546, 33, 11, 'C', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo_classe`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `controlador` varchar(255) DEFAULT NULL,
  `funcao` varchar(255) DEFAULT NULL,
  `secao` varchar(20) DEFAULT NULL,
  `id_modulo` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `nome` (`nome`),
  KEY `id_classe` (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `tb_conteudo_classe`
--

INSERT INTO `tb_conteudo_classe` (`id`, `nome`, `id_perfil`, `controlador`, `funcao`, `secao`, `id_modulo`, `status`) VALUES
(33, 'Template', 2, 'ControladorTemplate', 'telaListarTemplate', 'Template', 8, 1),
(34, 'teste', 2, 'teste', 'teste', NULL, 10, 0),
(35, 'eeee', 2, 'eeee', 'eeeee', NULL, 10, 0),
(37, 'OK2', 2, 'ok2', 'ok2', NULL, 8, 0),
(38, 'AAA', 2, 'aaaaa', 'aaaa', 'aaaa', 8, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo_login`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Extraindo dados da tabela `tb_conteudo_login`
--

INSERT INTO `tb_conteudo_login` (`id`, `id_usuario`, `data`, `status`) VALUES
(1, 1, '2014-09-06 13:24:04', 1),
(2, 1, '2014-09-06 13:37:59', 1),
(3, 1, '2014-09-06 22:47:09', 1),
(4, 1, '2014-09-06 23:17:50', 1),
(5, 1, '2014-09-06 23:20:09', 1),
(6, 8, '2014-09-06 23:41:10', 1),
(7, 1, '2014-09-06 23:46:01', 1),
(8, 1, '2014-09-07 09:05:39', 1),
(9, 1, '2014-09-07 10:26:44', 1),
(10, 1, '2014-09-07 11:30:35', 1),
(11, 1, '2014-09-07 11:30:39', 1),
(12, 1, '2014-09-07 20:48:52', 1),
(13, 1, '2014-09-08 20:57:45', 1),
(14, 1, '2014-09-08 21:36:16', 1),
(15, 1, '2014-09-09 08:04:57', 1),
(16, 1, '2014-09-09 08:05:07', 1),
(17, 1, '2014-09-09 08:05:59', 1),
(18, 1, '2014-09-09 08:06:43', 1),
(19, 1, '2014-09-09 08:07:45', 1),
(20, 1, '2014-09-09 08:10:38', 1),
(21, 1, '2014-09-09 08:12:34', 1),
(22, 1, '2014-09-10 07:39:55', 1),
(23, 1, '2014-09-11 20:04:52', 1),
(24, 1, '2014-09-11 20:33:46', 1),
(25, 1, '2014-09-11 21:19:10', 1),
(26, 1, '2014-09-11 21:19:21', 1),
(27, 1, '2014-09-24 07:52:59', 1),
(28, 1, '2014-12-03 08:13:17', 1),
(29, 1, '2014-12-12 07:43:40', 1),
(30, 1, '2014-12-13 08:08:47', 1),
(31, 1, '2014-12-13 08:16:21', 1),
(32, 1, '2014-12-13 09:54:35', 1),
(33, 1, '2014-12-17 20:49:14', 1),
(34, 1, '2015-01-07 20:58:50', 1),
(35, 1, '2015-01-10 21:07:44', 1),
(36, 1, '2015-01-11 08:01:20', 1),
(37, 1, '2015-01-14 20:58:15', 1),
(38, 1, '2015-02-24 23:00:47', 1),
(39, 1, '2015-06-01 20:45:46', 1),
(40, 1, '2015-06-01 20:49:15', 1),
(41, 1, '2015-06-01 21:15:05', 1),
(42, 1, '2015-06-01 21:15:48', 1),
(43, 1, '2015-06-01 21:19:20', 1),
(44, 1, '2015-06-01 21:20:22', 1),
(45, 1, '2015-06-01 21:23:26', 1),
(46, 1, '2015-06-02 00:45:11', 1),
(47, 1, '2015-06-30 20:37:55', 1),
(48, 11, '2015-06-30 20:38:36', 1),
(49, 1, '2015-06-30 20:50:46', 1),
(50, 11, '2015-06-30 20:56:34', 1),
(51, 1, '2015-06-30 20:58:24', 1),
(52, 11, '2015-06-30 20:58:56', 1),
(53, 1, '2015-06-30 21:17:58', 1),
(54, 11, '2015-06-30 21:20:14', 1),
(55, 11, '2015-06-30 21:31:17', 1),
(56, 11, '2015-06-30 21:31:20', 1),
(57, 1, '2015-06-30 21:34:46', 1),
(58, 11, '2015-07-02 08:19:53', 1),
(59, 1, '2015-07-14 21:35:37', 1),
(60, 1, '2015-07-18 14:42:34', 1),
(61, 1, '2015-07-25 21:00:10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo_modulo`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_conteudo_modulo`
--

INSERT INTO `tb_conteudo_modulo` (`id`, `nome`, `status`) VALUES
(1, 'Cadastros', 0),
(2, 'Suprimentos', 0),
(3, 'Serviços', 0),
(4, 'Estoque', 0),
(5, 'Atividades', 0),
(6, 'Relatórios', 0),
(7, 'Gráficos', 0),
(8, 'SITE', 1),
(9, 'TESTE', 0),
(10, 'TESTE', 0),
(11, 'TESTE2', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo_pais`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Extraindo dados da tabela `tb_conteudo_pais`
--

INSERT INTO `tb_conteudo_pais` (`id`, `nome`) VALUES
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
-- Estrutura da tabela `tb_conteudo_template`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_pais` (`id_pais`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Extraindo dados da tabela `tb_conteudo_template`
--

INSERT INTO `tb_conteudo_template` (`id`, `nome`, `sexo`, `estado_civil`, `profissao`, `faixa_salarial`, `data_nascimento`, `cpf`, `identidade`, `imagem`, `arquivo`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `cep`, `estado`, `telefone_residencial`, `telefone_celular`, `telefone_comercial`, `email`, `data_cadastro`, `data_modificacao`, `id_pais`, `id_empresa`, `status`) VALUES
(1, 'RAPHAEL FERRER DA SILVA 2', 'M', 'C', '', 11.11, '1982-10-11 00:00:00', '035.404.834-11', '6103685', '2-10489934_10204741234918316_3879454862344895040_n.jpg', '3-MegaMan.pdf', 'RUA THECOSLOVAQUIA', 707, 'CASA 07 - CONDOMINIO BELO HORI', 'PAU AMARELO', 'PAULISTA', '51260-130', 'PE', '(81) 3432-7686', '(81) 8154-6434', '(81) 3432-7686', 'rferrerdasilva@gmail.com', '2013-02-26 14:03:53', '2015-07-18 14:43:24', 17, 2, 1),
(2, 'ALBANIA SHIRLEY DE FREITAS', 'F', 'C', 'ADMINISTRADORA', 0, '1990-02-11 00:00:00', '083.551.384-06', '7707520', 'albania.jpg', NULL, 'RUA THECOSLOVAQUIA', 707, 'CASA 07 - CONDOMINIO BELO HORI', 'PAU AMARELO', 'PAULISTA', '', 'PE', '(81) 3432-7686', '(81) 8150-2757', '(81) 3432-7686', 'albaniafreitas@hotmail.com', '2013-02-26 14:09:21', '2013-03-28 14:26:43', 17, 2, 1),
(3, 'MATHEUS MAGALHÃES', 'M', 'S', 'ESTUDANTE', 0, '2001-02-20 00:00:00', '', '', '1-398079_244834708984891_2075752976_n.jpg', NULL, 'RUA JOÃO FRANCISCO BATISTA', 70, 'CS 09', 'JANGA', 'PAULISTA', '', 'PE', '(81) 3203-0396', '', '', 'matheusilvamaga@hotmail.com', '2013-02-27 09:33:15', '2013-02-28 21:44:06', 17, 2, 0),
(4, 'MAYARA BRANDÃO', 'F', 'S', 'VETERINÁRIA', 0, '1989-11-14 00:00:00', '073.812.174-65', '7197330', '', NULL, 'RUA BONCONSELHO', 286, '', 'ARTHUR LUNDGREN 1', 'PAULISTA', '53417-190', 'PE', '(81) 3371-0014', '(81) 9684-6944', '', 'brandaomay@gmail.com', '2013-03-28 14:29:17', NULL, 17, 2, 0),
(5, 'JACIARA MAYARA DA SILVA MENDONÇA', 'F', 'C', 'RECEPCIONISTA', 0, '1995-05-10 00:00:00', '061.100.794-05', '7883190', '', NULL, 'RUA VIETNÃ DO NORTE', 1630, 'CASA A', 'PAU AMARELO', 'PAULISTA', '53433-240', 'PE', '', '(81) 8876-5132', '', 'jaciaramayara@hotmail.com', '2013-03-28 14:32:03', NULL, 17, 2, 0),
(6, 'JOSE ROGERIO DE OLIVEIRA', 'M', 'C', '', 0, '1971-12-23 00:00:00', '', '', '', '', 'RUA FALCÃO DE LACERDA', 233, 'CS 46', 'TIJIPIÓ', 'RECIFE', '50930-010', 'PE', '(81) 3254-7850', '(81) 8762-8219', '', '', '2013-03-30 12:08:11', '2015-06-30 22:06:11', 17, 2, 1),
(9, 'TACIANE KARLA FRANKLIN', 'F', 'S', '', 0, '1993-07-14 00:00:00', '', '', '416145.jpg', '', 'RUA SENADOR BARROS DE CARVALHO', 116, 'CS A', 'OURO PRETO', 'OLINDA', '', 'PE', '', '(81) 8324-5220', '(81) 8611-7506', '', '2013-04-05 16:02:07', '2015-06-30 22:04:56', 17, 2, 1),
(10, 'KEVIN GOMES', 'M', 'S', '', 0, '1996-06-25 00:00:00', '111.248.454-02', '8035275', '', NULL, 'RUA NAPOLIS', 116, '', 'JARDIM FRAGOSO', 'OLINDA', '53060-475', 'PE', '(81) 3439-2935', '(81) 9259-3588', '', '', '2013-04-06 10:31:42', NULL, 17, 2, 0),
(11, 'PEDRO VICTOR SANTOS MOREIRA', 'M', 'S', '', 0, '1998-11-21 00:00:00', '', '', '', NULL, 'AVENIDA PEDRO ALVARES CABRAL', 1068, 'CS B', 'JARDIM FRAGOSO', 'OLINDA', '53140-290', 'PE', '', '(81) 8800-5308', '', '', '2013-04-08 17:02:52', NULL, 17, 2, 1),
(12, 'AMARO QUIRINO', 'M', 'C', '', 0, '1963-11-20 00:00:00', '', '', '', NULL, 'RUA DO CAMPO', 21, '', 'TABAJARA', 'OLINDA', '53550-350', 'PE', '(81) 3439-5871', '', '', '', '2013-04-09 08:56:39', NULL, 17, 2, 1),
(13, 'SHIRLEY GOMES DIAS', 'F', 'C', '', 0, '1979-05-23 00:00:00', '', '', '', NULL, 'RUA SANTA ROSA', 68, '', 'OURO PRETO', 'OLINDA', '', 'PE', '', '(81) 8855-5703', '', '', '2013-04-09 10:25:54', NULL, 17, 2, 1),
(14, 'ROMILDA BEZERRA DOS SANTOS', 'F', 'S', '', 0, '1963-01-20 00:00:00', '', '', '', NULL, 'AVENIDA 04 DE OUTUBRO', 36, '', 'TABAJARA', 'OLINDA', '', 'PE', '', '(81) 8697-3330', '', '', '2013-04-10 16:01:24', NULL, 17, 2, 1),
(15, 'MARIA LUCIENE ALMEIDA', 'F', 'C', '', 0, '1947-07-16 00:00:00', '', '', '', NULL, 'RUA SENHORZINHO DE BARROS DIAS', 654, '', 'BAIXA VERDE', 'ITAMARACÁ', '', 'PE', '', '(81) 8911-6989', '(81) 9934-8658', '', '2013-04-11 13:01:39', NULL, 17, 2, 1),
(16, 'MARCOS ANTONIO DOS SANTOS RAMOS', 'M', 'C', '', 0, '1960-06-03 00:00:00', '', '', '', NULL, 'AVENIDA PRESIDENTE KENNEDY', 3366, '', 'PEIXINHOS', 'OLINDA', '', 'PE', '', '(81) 8645-4302', '', '', '2013-04-11 13:45:22', NULL, 17, 2, 1),
(17, 'IVALTER SOUZA', 'M', 'S', '', 0, '1973-11-09 00:00:00', '', '', '', NULL, 'RUA CARAJÁS', 27, 'CS B', 'TABAJARA', 'OLINDA', '', 'PE', '', '(81) 8805-5406', '', '', '2013-04-12 15:39:21', NULL, 17, 2, 1),
(18, 'MARCOS ANTONIO DOS SANTOS', 'M', 'C', '', 0, '1971-07-15 00:00:00', '', '', '', NULL, 'RUA MARIA ASSUNÇÃO GONÇALVES DAS NEVES', 7, 'CASA A', 'JATOBÁ', 'OLINDA', '53250-192', 'PE', '(81) 8665-1608', '(81) 8687-8356', '', '', '2013-04-13 14:13:17', NULL, 17, 2, 1),
(19, 'AMANDA MARIA MATOS DE ALBUQUERQUE', 'F', 'S', '', 0, '1987-02-18 00:00:00', '', '', '', NULL, 'RUA MARIA EDUARDA', 200, '', 'JARDIM FRAGOSO', 'OLINDA', '53060-525', 'PE', '', '(81) 8897-6150', '(81) 8741-2055', '', '2013-04-13 15:31:48', NULL, 17, 2, 1),
(20, 'ARIANE PRISCILA FREITAS', 'F', 'C', '', 0, '1984-04-23 00:00:00', '', '', '', NULL, 'RUA WALFRIDO MORAES', 387, 'AP 203 BL A', 'JANGA', 'PAULISTA', '53437-100', 'PE', '', '(81) 8888-3229', '', '', '2013-04-13 17:20:52', NULL, 17, 2, 1),
(21, 'GILMAR GOMES DE BRITO', 'M', 'C', '', 0, '1970-01-27 00:00:00', '', '', '', NULL, 'RUA DO PRINCIPE', 140, '', 'VILA TORRES GALVÃO', 'PAULISTA', '', 'PE', '(81) 3438-0582', '(81) 9272-8059', '', '', '2013-04-16 16:07:35', NULL, 17, 2, 1),
(22, 'ELIEL VITOR', 'M', 'S', '', 0, '1963-02-02 00:00:00', '', '', '', NULL, 'RUA ITAMARACÁ', 62, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '', '(81) 8614-9686', '', '', '2013-04-16 16:19:20', NULL, 17, 2, 1),
(23, 'ANDERSON BARBOSA DE LIRA', 'M', 'C', '', 0, '1975-01-08 00:00:00', '', '', '', NULL, 'RUA AIRTON SENNA', 127, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '', '(81) 8842-6897', '', '', '2013-04-16 17:18:29', NULL, 17, 2, 1),
(24, 'LUZIA', 'F', 'C', '', 0, '1987-02-10 00:00:00', '', '', '', NULL, 'RUA DOUTOR ANTONIO JOSE ALMEIDA PERNAMBUCO', 7, '', 'OURO PRETO', 'OLINDA', '', 'PE', '', '(81) 8853-0975', '', '', '2013-04-16 17:22:12', NULL, 17, 2, 1),
(25, 'EDSON JOSÉ DA PAZ JUNIOR', 'M', 'S', '', 0, '1995-03-22 00:00:00', '', '', '', NULL, 'RUA NAPOLIS', 68, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '(81) 3439-3674', '(81) 8564-9241', '', '', '2013-04-19 16:11:57', NULL, 17, 2, 1),
(26, 'CLAUDIA MARIA ALVES LIBERALINO', 'F', 'C', '', 0, '1983-11-04 00:00:00', '', '', '', NULL, 'RUA ARARIBA', 14, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '(81) 3012-2246', '(81) 8797-3189', '', '', '2013-04-20 09:59:10', NULL, 17, 2, 1),
(27, 'CLARISSE SANTOS', 'F', 'S', '', 0, '1999-12-23 00:00:00', '', '', '', NULL, 'RUA BORBOLETA', 15, 'CASA C', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '', '(81) 8337-8799', '', '', '2013-04-20 10:40:34', NULL, 17, 2, 1),
(28, 'ACACIA PEREIRA', 'F', 'C', '', 0, '1986-08-12 00:00:00', '', '', '', NULL, 'AVENIDA DOUTOR JOAQUIM NABUCO', 46, '', 'TABAJARA', 'OLINDA', '', 'PE', '', '(81) 8314-8824', '', '', '2013-04-20 11:22:43', NULL, 17, 2, 1),
(29, 'JONAS NUNES DE LIMA', 'M', 'C', '', 0, '1978-01-18 00:00:00', '', '', '', NULL, 'RODOVIA PE15', 1994, 'CASA A', 'TABAJARA', 'OLINDA', '', 'PE', '(81) 3371-8310', '(81) 8646-4047', '', '', '2013-04-20 11:57:05', NULL, 17, 2, 1),
(30, 'CYBELLY CAROLINNE SILVA', 'F', 'S', '', 0, '1992-04-01 00:00:00', '', '', '', NULL, 'RUA PASTOR GEDEÃO ROSA DOS SANTOS', 33, '', 'ARTHUR LUNDGREN II', 'PAULISTA', '53416-590', 'PE', '(81) 3371-3117', '(81) 8519-3152', '', '', '2013-04-23 14:32:31', NULL, 17, 2, 1),
(31, 'MIQUELINE GOMES', 'F', 'C', '', 0, '1985-08-04 00:00:00', '', '', '', NULL, 'RUA BELA VISTA', 312, '', 'JARDIM FRAGOSO', 'OLINDA', '53060-525', 'PE', '(81) 3495-4134', '(81) 9765-1572', '', '', '2013-04-23 15:08:23', NULL, 17, 2, 1),
(32, 'ANDREA FELIPE', 'F', 'C', '', 0, '1980-06-21 00:00:00', '', '', '', NULL, 'RUA NOSSA SENHORA DA CONCEIÇÃO', 100, '', 'OURO PRETO', 'OLINDA', '53350-790', 'PE', '(81) 3429-8542', '(81) 8678-8599', '', '', '2013-04-25 09:02:13', NULL, 17, 2, 1),
(33, 'HERON DE SOUZA', 'M', 'S', '', 0, '1975-10-22 00:00:00', '', '', '', NULL, 'RUA MARIA DAS NEVES GONÇALVES ASSUNÇÃO', 63, 'CASA A', 'JATOBÁ', 'OLINDA', '', 'PE', '', '(81) 8768-0848', '', '', '2013-04-25 12:17:39', NULL, 17, 2, 1),
(34, 'CLEITON DE SOUZA TEIXEIRA', 'M', 'S', '', 0, '1989-12-07 00:00:00', '', '', '', NULL, 'RUA SANTA ROSA', 57, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '', '(81) 8726-2856', '', '', '2013-04-25 15:29:25', NULL, 17, 2, 1),
(36, 'JOSE BERNARDINO BARBOSA', 'M', 'C', '', 0, '1947-06-11 00:00:00', '', '', '', NULL, 'RUA ANAPOLIS', 32, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '', '(81) 8689-8477', '', '', '2013-04-30 12:18:54', NULL, 17, 2, 1),
(37, 'JAZIEL JOSE GONÇALVES', 'M', 'S', '', 0, '1984-04-27 00:00:00', '', '', '', NULL, 'RUA JOSE ALEXANDRE DE CARVALHO', 712, '', 'JATOBÁ', 'OLINDA', '', 'PE', '(81) 3439-6179', '(81) 8513-3075', '', '', '2013-04-30 14:18:37', NULL, 17, 2, 1),
(38, 'JOSE WELLINGTON DOS SANTOS', 'M', 'C', '', 0, '1968-06-05 00:00:00', '', '', '', NULL, 'RUA 04 DE OUTUBRO', 12, 'CASA A', 'OURO PRETO', 'OLINDA', '', 'PE', '(81) 3493-4185', '(81) 8607-7033', '', '', '2013-04-30 16:23:35', NULL, 17, 2, 1),
(42, 'EDELSON JUNIOR', 'M', 'C', '', 0, '1983-09-06 00:00:00', '', '', '', NULL, 'RUA 74', 45, '', 'JARDIM PAULISTA BAIXO', 'PAULISTA', '', 'PE', '(81) 3437-0937', '(81) 8833-8276', '', '', '2013-05-14 12:00:10', NULL, 17, 2, 1),
(43, 'MARIA DA CONCEIÇÃO DA SILVA', 'F', 'C', '', 0, '1966-08-17 00:00:00', '', '', '', NULL, 'RUA AVENTA', 85, '', 'OURO PRETO', 'JATOBÁ', '', 'PE', '(81) 3429-5719', '(81) 8780-1459', '', '', '2013-05-16 09:32:23', NULL, 17, 2, 1),
(44, 'MARIA JOSE VANDERLEY', 'F', 'C', '', 0, '1948-02-14 00:00:00', '', '', '', NULL, 'RUA GILVAN BOTELHO ', 78, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '(81) 3493-6408', '(81) 9910-2003', '', '', '2013-05-16 10:59:30', NULL, 17, 2, 1),
(45, 'GERLANEA KASSIA', 'F', 'S', '', 0, '1994-04-05 00:00:00', '', '', '', NULL, 'AVENIDA BEIRA RIO', 844, '', 'JATOBÁ', 'OLINDA', '', 'PE', '', '(81) 8401-1396', '', '', '2013-05-24 13:20:09', NULL, 17, 2, 1),
(46, 'JOBSON RIBEIRO', 'M', 'C', '', 0, '1982-03-22 00:00:00', '', '', '', NULL, 'RUA TIJUCA', 7, '', 'JARDIM FRAGOSO', 'OLINDA', '', 'PE', '(81) 3053-8124', '(81) 8852-8684', '', '', '2013-05-24 15:41:39', NULL, 17, 2, 1),
(47, 'CARLOS ANTONIO RIBEIRO', 'M', 'C', '', 0, '1969-01-23 00:00:00', '', '', '', NULL, 'RUA GILVAN BOTELHO', 72, '', 'JATOBÁ', 'OLINDA', '', 'PE', '', '(81) 8696-9474', '', '', '2013-05-25 11:29:12', NULL, 17, 2, 1),
(48, 'FLAVIA ANDRADE', 'F', 'S', '', 0, '1986-08-04 00:00:00', '', '', '', NULL, 'AVENIDA 04 DE OUTUBRO', 226, '', 'OURO PRETO ', 'OLINDA', '', 'PE', '', '(81) 9789-5283', '', '', '2013-05-29 11:24:36', NULL, 17, 2, 1),
(51, 'MAGALI', 'F', 'C', 'PROGRAMADOR', 2500, '1984-05-23 00:00:00', '046.983.194-47', '6060318', '3-03._Reserva_Atlantica_Jatob_as_-_Implanta_C_eo.jpg', '3-03._Reserva_Atlantica_Jatob_as_-_Implanta_C_eo.jpg', 'RUA DO SACHO', 65, 'PROXIMO AO METRO', 'TEJIPIO', 'RECIFE', '50920-400', 'PE', '(88) 8888-8888', '(77) 7777-7777', '(99) 9999-9999', 'deibson.januario@gmail.com', '2014-09-11 20:59:02', NULL, 1, 0, 1),
(53, 'ASDASDASDASD', 'M', 'E', 'ASDASDAsd', 2312.31, '1984-05-23 00:00:00', '123.123.123-12', '123123123123123', 'n64_supermario64.jpg', '', '1231231231231', 213123, 'SD123123', 'ASDASDASDAd', 'ASDASDASDa', '12312-312', 'PB', '(12) 3123-1231', '(12) 3123-1231', '', '1231231231231', '2014-12-13 09:06:17', NULL, 17, 0, 1),
(56, 'ASDASDASDASDASDASDASD', 'M', '', '', 0, '1984-05-23 00:00:00', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2015-01-14 20:58:55', NULL, 17, 0, 1),
(57, 'ASDASDASD', 'M', '', '', 0, '1984-05-23 00:00:00', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2015-01-14 21:02:53', NULL, 17, 0, 1),
(60, 'Z-TESTE FINAL', 'M', '', '', 0, '0000-00-00 00:00:00', '', '', '5-Churrasqueira-de-cerca-bem-legaus-1.jpg', '8-AnaliseFuncional_241_04_284.docx', '', 0, '', '', '', '', '', '', '', '', '', '2015-06-01 23:10:14', NULL, 17, 0, 1),
(61, 'TESTE', 'F', 'C', 'AAAAAAAa', 222.22, '1984-05-03 00:00:00', '222.222.222-22', '222222222222222', '6-Churrasqueira-de-cerca-bem-legaus-1.jpg', '2-Churrasqueira-de-cerca-bem-legaus-3.jpg', '23333333333333333', 333333, '33333333333', 'AASDASDSDASD', 'ASDASDASDAS', '32342-342', 'PE', '(22) 2222-2222', '(22) 2222-2222', '(22) 2222-2222', '22323423423@email.com', '2015-06-01 23:12:48', NULL, 17, 0, 1),
(62, 'SDFDFSDFSDFS', 'M', '', '', 0, '0000-00-00 00:00:00', '', '', '3-03._Reserva_Atlantica_Jatob_as_-_Implanta_C_eo.jpg', '2-Internet_Banking.pdf', '', 0, '', '', '', '', '', '', '', '', '', '2015-06-02 00:47:39', NULL, 17, 0, 1),
(63, 'VAI PORRA', 'M', '', '', 0, '0000-00-00 00:00:00', '', '', '14-Churrasqueira-de-cerca-bem-legaus-1.jpg', '2-Internet_Banking_(1).pdf', '', 0, '', '', '', '', '', '', '', '', '', '2015-06-02 00:58:25', NULL, 17, 0, 1),
(64, 'ADASDASDASDASDASDADS', 'M', NULL, '', 0, '0000-00-00 00:00:00', '', NULL, '', '', '', 0, NULL, NULL, NULL, '', '', '', NULL, NULL, '', '2015-06-30 21:58:43', NULL, 17, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `id_perfil` int(11) NOT NULL COMMENT '1-Administrador e 2-usuario',
  `senha` varchar(256) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_conteudo_usuario`
--

INSERT INTO `tb_conteudo_usuario` (`id`, `nome`, `imagem`, `login`, `id_perfil`, `senha`, `status`) VALUES
(1, 'Administrador', '16142114.jpg', 'admin', 1, 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'TESTE', '03._Reserva_Atlantica_Jatob_as__Implanta_C_eo.jpg', 'teste', 2, '698dc19d489c4e4db73e28a713eab07b', 0),
(9, 'TESTE2', '', 'teste2', 2, '892835feacf8986042482892e577a602', 0),
(10, 'TESTE2', '03._Reserva_Atlantica_Jatob_as_-_Implanta_C_eo.jpg', 'teste2', 1, '202cb962ac59075b964b07152d234b70', 0),
(11, 'DEIBSON', 'DSCF1627.JPG', 'deibson', 2, 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_conteudo_acao_usuario`
--
ALTER TABLE `tb_conteudo_acao_usuario`
  ADD CONSTRAINT `tb_conteudo_acao_usuario_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `tb_conteudo_classe` (`id`),
  ADD CONSTRAINT `tb_conteudo_acao_usuario_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tb_conteudo_usuario` (`id`);

--
-- Limitadores para a tabela `tb_conteudo_classe`
--
ALTER TABLE `tb_conteudo_classe`
  ADD CONSTRAINT `tb_conteudo_classe_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tb_conteudo_modulo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
