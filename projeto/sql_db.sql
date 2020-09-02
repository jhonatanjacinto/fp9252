CREATE DATABASE caeland;
USE caeland;

CREATE TABLE emails_newsletter (
    email_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE registros (
    pessoa_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    idade TINYINT(3) DEFAULT 0
);

CREATE TABLE contatos (
    contato_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mensagem TEXT NOT NULL,
    data_contato TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE depoimentos (
    depoimento_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    texto VARCHAR(150) NOT NULL,
    foto VARCHAR(50) DEFAULT NULL,
    ativo BOOLEAN DEFAULT 1
);

CREATE TABLE nosso_time (
    membro_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    minicurriculo VARCHAR(150) NOT NULL,
    foto VARCHAR(50) DEFAULT NULL,
    ativo BOOLEAN DEFAULT 1
);

CREATE TABLE usuarios_admin (
    usuario_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email_login VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    ativo BOOLEAN DEFAULT 1
);

ALTER TABLE usuarios_admin ADD CONSTRAINT email_unique UNIQUE (email_login);

CREATE TABLE servicos (
    servico_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome_servico VARCHAR(50) NOT NULL,
    texto_servico TEXT NOT NULL,
    ativo BOOLEAN DEFAULT 1
);

CREATE TABLE categorias (
    categoria_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(50) NOT NULL
);

CREATE TABLE portfolio (
    projeto_id INT (11) AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT (11),
    FOREIGN KEY (categoria_id) REFERENCES categorias (categoria_id) 
    ON UPDATE CASCADE ON DELETE SET NULL,
    titulo VARCHAR(50) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(100) NOT NULL,
    ativo BOOLEAN DEFAULT 1,
    data_projeto TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);