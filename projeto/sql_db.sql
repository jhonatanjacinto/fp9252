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