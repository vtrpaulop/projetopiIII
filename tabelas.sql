CREATE TABLE funcoes (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL UNIQUE
);

INSERT INTO funcoes(nome) VALUES('user'), ('admin'), ('supervisor'), ('colaborador');

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  sobreNome VARCHAR(255) NOT NULL,
  rg VARCHAR(20) NOT NULL,
  cpf VARCHAR(20) UNIQUE NOT NULL,
  data_nascimento DATE NOT NULL,
  telefone VARCHAR(255) NOT NULL,
  cartaoSus VARCHAR(20) NOT NULL,
  endereco VARCHAR(255) NOT NULL,
  bairro VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  senha VARCHAR(255) NOT NULL,
  funcao_fk BIGINT NOT NULL,
  FOREIGN KEY (funcao_fk) REFERENCES funcoes(id)
);

CREATE TABLE tipo_etario (
  `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
  `tipo` varchar(100) NOT NULL UNIQUE
);

CREATE TABLE vacinas (
  `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) DEFAULT NULL,
  `protecao_contra` varchar(255) DEFAULT NULL,
  `composicao` varchar(255) DEFAULT NULL,
  `numero_doses` varchar(255) DEFAULT NULL,
  `idade_recomendada` varchar(255) DEFAULT NULL,
  `intervalo_entre_doses` varchar(255) DEFAULT NULL,
  `esquema_basico` varchar(255) DEFAULT NULL,
  `reforco_recomendado_minimo` varchar(255) DEFAULT NULL,
  `minimo` varchar(255) DEFAULT NULL,
  `tipo_etario_fk` BIGINT NOT NULL,

  FOREIGN KEY (tipo_etario_fk) REFERENCES tipo_etario(id)
);

INSERT INTO tipo_etario (`id`, `tipo`) VALUES (1, 'infanto'), (2, 'adolescente');

INSERT INTO `vacinas` (`nome`, `protecao_contra`, `numero_doses`, `idade_recomendada`, `intervalo_entre_doses`, `esquema_basico`, `reforco_recomendado_minimo`, `tipo_etario_fk`) VALUES
('Hepatite B', 'Antígeno recombinante de superfície do vírus purificado', 'Iniciar ou completar 3 doses', '-', '2ª dose: 1 mês após 1ª dose. 3ª dose: 6 meses após', '2ª dose: 1 mês após 1ª dose. 3ª dose: 4 meses após 1ª dose.', '-', 2),
('Difteria e Tétano', 'Toxoides diftérico e tetânico purificados', 'Iniciar ou completar 3 doses', 'A cada 10 anos.', '60 dias', '30 dias', 'Em caso de ferimentos graves, deve-se reduzir este intervalo para 5 anos', 2),
('Febre Amarela', 'Vírus vivo atenuado', 'Dose única', '-', '-', '-', 'Reforço, caso a pessoa tenha recebido uma dose da vacina antes de completar 5 anos de idade', 2),
('Sarampo, Caxumba e Rubéola', 'Vírus vivo atenuado', 'Iniciar ou completar 2 doses', '-', '-', '30 dias', '-', 2),
('Papilomavírus Humano 6, 11, 16 e 18', 'Antígeno recombinante da proteína L1 dos vírus 6, 11, 16 e 18 do HPV', 'Dose única', '11 a 14 anos', '-', '-', '-', 2),
('Pneumocócica 23-valente', 'Polissacarídeo capsular de 23 sorotipos de pneumococos', 'Uma dose', 'A partir de 5 anos para os povos indígenas.', '5 anos', '3 anos', 'Uma dose a depender da situação vacinal anterior com a PCV 10', 2),
('Meningocócica ACWY', 'Polissacarídeos capsulares purificados da Neisseria meningitidis dos sorogrupos A, C, W e Y', 'Uma dose', '11 a 14 anos', '-', '-', '-', 2);

INSERT INTO `vacinas` (`nome`, `protecao_contra`, `composicao`, `numero_doses`, `idade_recomendada`, `intervalo_entre_doses`, `esquema_basico`, `reforco_recomendado_minimo`, `minimo`, `tipo_etario_fk`) VALUES
('BCG', 'Formas graves de tuberculose (meníngea e miliar)', 'Bactéria viva atenuada', 'Dose única', 'Ao nascer', '-', '-', '-', '-', 1),
('Hepatite B (HB - recombinante)', 'Hepatite B', 'Antígeno recombinante de superfície do vírus purificado', 'Dose ao nascer', 'Ao nascer', '-', '-', '-', '-', 1),
('Poliomielite 1, 2 e 3 (VIP - inativada)', 'Poliomielite', 'Vírus inativado', '3 doses', '1ª dose: 2 meses, 2ª dose: 4 meses, 3ª dose: 6 meses', '60 dias', '30 dias', '2 reforços com a vacina VOP', '-', 1),
('Poliomielite 1 e 3 (VOPb - atenuada)', 'Poliomielite', 'Vírus vivo atenuado', '-', '15 meses e 4 anos', '-', '1º reforço: 6 meses após 3ª dose da VIP, 2º reforço: 6 meses após 1º reforço', '-', '-', 1),
('Rotavírus humano G1P[8] (ROTA)', 'Diarreia por Rotavírus', 'Vírus vivo atenuado', '2 doses', '1ª dose: 2 meses, 2ª dose: 4 meses', '60 dias', '30 dias', '-', '-', 1),
('DTP/HB/Hib (Penta)', 'Difteria, Tétano, Coqueluche, Haemophilus influenzae B e Hepatite B', 'Toxoides diftérico e tetânico purificados + bactéria da coqueluche inativada e purificada + Oligossacarídeos conjugados do HiB + antígeno de superfície de HB', '3 doses', '1ª dose: 2 meses, 2ª dose: 4 meses, 3ª dose: 6 meses', '60 dias', '30 dias', '2 reforços com a vacina DTP', '-', 1),
('Pneumocócica 10-valente (VPC 10 - conjugada)', 'Pneumonias, Meningites, Otites, Sinusites pelos sorotipos que compõem a vacina', 'Polissacarídeo capsular de 10 sorotipos de pneumococos', '2 doses', '1ª dose: 2 meses, 2ª dose: 4 meses, Reforço: 12 meses', '60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço', '30 dias', 'Reforço', '-', 1),
('Meningocócica C (conjugada)', 'Meningite meningocócica tipo C', 'Polissacarídeos capsulares purificados da Neisseria meningitidis do sorogrupo C', '2 doses', '1ª dose: 3 meses, 2ª dose: 5 meses, Reforço: 12 meses', '60 dias entre a 1ª dose e 2ª dose, 60 dias entre a 2ª dose e o reforço', '30 dias', 'Reforço', '-', 1),
('Vacina COVID-19', 'Formas graves e óbitos por covid-19, causada pelo SARS-CoV-2', 'RNA mensageiro (RNAm) de cadeia simples, codificando a proteína S (spike) do coronavírus 2 (SARS-CoV-2)', '3 doses', '1ª dose: 6 meses, 2ª dose: 7 meses, 3ª dose: 9 meses', '4 semanas após 1ª dose, 8 semanas após 2ª dose', '4 semanas após 1ª dose, 8 semanas após 2ª dose', '-', '-', 1),
('Febre Amarela (VFA - atenuada)', 'Febre Amarela', 'Vírus vivo atenuado', 'Uma dose', 'Dose: 9 meses, Reforço: 4 anos de idade', '-', '30 dias', 'Reforço', '-', 1),
('Sarampo, caxumba, rubéola (SCR - atenuada) (Tríplice viral)', 'Sarampo, Caxumba e Rubéola', 'Vírus vivo atenuado', '2 doses', '12 meses', '-', '30 dias', '-', '-', 1),
('Sarampo, caxumba, rubéola e varicela (SCRV - atenuada) (Tetraviral)', 'Sarampo, Caxumba, Rubéola e Varicela', 'Vírus vivo atenuado', 'Uma dose (2ª dose da tríplice viral e 1ª de varicela)', '15 meses', '-', '-', '-', '-', 1),
('Hepatite A (HA - inativada)', 'Hepatite A', 'Vírus inativado', 'Uma dose', '15 meses', '-', '-', '-', '-', 1),
('Difteria, Tétano e Pertussis (DTP)', 'Difteria, Tétano e Coqueluche', 'Toxoides diftérico e tetânico purificados + bactéria da coqueluche (célula inteira) inativada e purificada', '3 doses (Considerar doses anteriores)', '1º reforço: 15 meses, 2º reforço: 4 anos de idade', '1º reforço: 9 meses após 3ª dose, 2º reforço: 3 anos após 1º reforço', '1º reforço: 6 meses após 3ª dose, 2º reforço: 6 meses após 1º reforço', '2 reforços', '-', 1),
('Difteria e Tétano (dT)', 'Difteria e Tétano', 'Toxoides diftérico e tetânico purificados', '3 doses (Considerar doses anteriores com penta e DTP)', 'A partir dos 7 anos', '60 dias', '30 dias', 'A cada 10 anos. Em caso de ferimentos graves, deve-se reduzir este intervalo para 5 anos', '-', 1),
('Papilomavírus humano 6, 11, 16 e 18 (HPV4 - recombinante)', 'Papilomavírus Humano 6, 11, 16 e 18 (recombinante)', 'Antígeno recombinante da proteína L1 os vírus 6, 11, 16 e 18 do HPV', 'Dose única', '09 e 10 anos (meninas e meninos)', '-', '-', '-', '-', 1),
('Pneumocócica 23-valente (VPP 23 - polissacarídica)', 'Meningites bacterianas, Pneumonias, Sinusite e outros', 'Polissacarídeo capsular de 23 sorotipos de pneumococos', '2 doses', 'A partir de 5 anos para os povos indígenas. A 2ª dose deve ser feita 5 anos após a 1ª dose', '5 anos', '3 anos', 'Uma dose a depender da situação vacinal anterior com a PCV 10', '-', 1),
('Varicela (VZ - atenuada)', 'Varicela (Catapora)', 'Vírus vivo atenuado', 'Uma dose (Corresponde a 2ª dose da varicela)', '4 anos', '-', '30 dias', '-', '-', 1);