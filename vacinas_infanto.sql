-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2024 às 20:15
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetopi3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacinas_infanto`
--

CREATE TABLE `vacinas_infanto` (
  `id` int(11) NOT NULL,
  `vacina` varchar(255) DEFAULT NULL,
  `protecao_contra` varchar(255) DEFAULT NULL,
  `composicao` varchar(255) DEFAULT NULL,
  `numero_de_doses` varchar(255) DEFAULT NULL,
  `idade_recomendada` varchar(255) DEFAULT NULL,
  `intervalo_entre_as_doses` varchar(255) DEFAULT NULL,
  `esquema_basico` varchar(255) DEFAULT NULL,
  `reforco_recomendado` varchar(255) DEFAULT NULL,
  `minimo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vacinas_infanto`
--

INSERT INTO `vacinas_infanto` (`id`, `vacina`, `protecao_contra`, `composicao`, `numero_de_doses`, `idade_recomendada`, `intervalo_entre_as_doses`, `esquema_basico`, `reforco_recomendado`, `minimo`) VALUES
(1, 'BCG', 'Formas graves de tuberculose (meníngea e miliar)', 'Bactéria viva atenuada', 'Dose única', 'Ao nascer', '-', '-', '-', '-'),
(2, 'Hepatite B (HB - recombinante)', 'Hepatite B', 'Antígeno recombinante de superfície do vírus purificado', 'Dose ao nascer', 'Ao nascer', '-', '-', '-', '-'),
(3, 'Poliomielite 1, 2 e 3 (VIP - inativada)', 'Poliomielite', 'Vírus inativado', '3 doses', '1ª dose: 2 meses, 2ª dose: 4 meses, 3ª dose: 6 meses', '60 dias', '30 dias', '2 reforços com a vacina VOP', '-'),
(4, 'Poliomielite 1 e 3 (VOPb - atenuada)', 'Poliomielite', 'Vírus vivo atenuado', '-', '15 meses e 4 anos', '-', '1º reforço: 6 meses após 3ª dose da VIP, 2º reforço: 6 meses após 1º reforço', '-', '-'),
(5, 'Rotavírus humano G1P[8] (ROTA)', 'Diarreia por Rotavírus', 'Vírus vivo atenuado', '2 doses', '1ª dose: 2 meses, 2ª dose: 4 meses', '60 dias', '30 dias', '-', '-'),
(6, 'DTP/HB/Hib (Penta)', 'Difteria, Tétano, Coqueluche, Haemophilus influenzae B e Hepatite B', 'Toxoides diftérico e tetânico purificados + bactéria da coqueluche inativada e purificada + Oligossacarídeos conjugados do HiB + antígeno de superfície de HB', '3 doses', '1ª dose: 2 meses, 2ª dose: 4 meses, 3ª dose: 6 meses', '60 dias', '30 dias', '2 reforços com a vacina DTP', '-'),
(7, 'Pneumocócica 10-valente (VPC 10 - conjugada)', 'Pneumonias, Meningites, Otites, Sinusites pelos sorotipos que compõem a vacina', 'Polissacarídeo capsular de 10 sorotipos de pneumococos', '2 doses', '1ª dose: 2 meses, 2ª dose: 4 meses, Reforço: 12 meses', '60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço', '30 dias', 'Reforço', '-'),
(8, 'Meningocócica C (conjugada)', 'Meningite meningocócica tipo C', 'Polissacarídeos capsulares purificados da Neisseria meningitidis do sorogrupo C', '2 doses', '1ª dose: 3 meses, 2ª dose: 5 meses, Reforço: 12 meses', '60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço', '30 dias', 'Reforço', '-'),
(9, 'Vacina COVID-19', 'Formas graves e óbitos por covid-19, causada pelo SARS-CoV-2', 'RNA mensageiro (RNAm) de cadeia simples, codificando a proteína S (spike) do coronavírus 2 (SARS-CoV-2)', '3 doses', '1ª dose: 6 meses, 2ª dose: 7 meses, 3ª dose: 9 meses', '4 semanas após 1ª dose, 8 semanas após 2ª dose', '4 semanas após 1ª dose, 8 semanas após 2ª dose', '-', '-'),
(10, 'Febre Amarela (VFA - atenuada)', 'Febre Amarela', 'Vírus vivo atenuado', 'Uma dose', 'Dose: 9 meses, Reforço: 4 anos de idade', '-', '30 dias', 'Reforço', '-'),
(11, 'Sarampo, caxumba, rubéola (SCR - atenuada) (Tríplice viral)', 'Sarampo, Caxumba e Rubéola', 'Vírus vivo atenuado', '2 doses', '12 meses', '-', '30 dias', '-', '-'),
(12, 'Sarampo, caxumba, rubéola e varicela (SCRV – atenuada) (Tetraviral)', 'Sarampo, Caxumba, Rubéola e Varicela', 'Vírus vivo atenuado', 'Uma dose (2ª dose da tríplice viral e 1ª de varicela)', '15 meses', '-', '-', '-', '-'),
(13, 'Hepatite A (HA - inativada)', 'Hepatite A', 'Vírus inativado', 'Uma dose', '15 meses', '-', '-', '-', '-'),
(14, 'Difteria, Tétano e Pertussis (DTP)', 'Difteria, Tétano e Coqueluche', 'Toxoides diftérico e tetânico purificados + bactéria da coqueluche (célula inteira) inativada e purificada', '3 doses (Considerar doses anteriores)', '1º reforço: 15 meses, 2º reforço: 4 anos de idade', '1º reforço: 9 meses após 3ª dose, 2º reforço: 3 anos após 1º reforço', '1º reforço: 6 meses após 3ª dose, 2º reforço: 6 meses após 1º reforço', '2 reforços', '-'),
(15, 'Difteria e Tétano (dT)', 'Difteria e Tétano', 'Toxoides diftérico e tetânico purificados', '3 doses (Considerar doses anteriores com penta e DTP)', 'A partir dos 7 anos', '60 dias', '30 dias', 'A cada 10 anos. Em caso de ferimentos graves, deve-se reduzir este intervalo para 5 anos', '-'),
(16, 'Papilomavírus humano 6, 11, 16 e 18 (HPV4 - recombinante)', 'Papilomavírus Humano 6, 11, 16 e 18 (recombinante)', 'Antígeno recombinante da proteína L1 os vírus 6, 11, 16 e 18 do HPV', 'Dose única', '09 e 10 anos (meninas e meninos)', '-', '-', '-', '-'),
(17, 'Pneumocócica 23-valente (VPP 23 - polissacarídica)', 'Meningites bacterianas, Pneumonias, Sinusite e outros', 'Polissacarídeo capsular de 23 sorotipos de pneumococos', '2 doses', 'A partir de 5 anos para os povos indígenas. A 2ª dose deve ser feita 5 anos após a 1ª dose', '5 anos', '3 anos', 'Uma dose a depender da situação vacinal anterior com a PCV 10', '-'),
(18, 'Varicela (VZ – atenuada)', 'Varicela (Catapora)', 'Vírus vivo atenuado', 'Uma dose (Corresponde a 2ª dose da varicela)', '4 anos', '-', '30 dias', '-', '-');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `vacinas_infanto`
--
ALTER TABLE `vacinas_infanto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `vacinas_infanto`
--
ALTER TABLE `vacinas_infanto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
