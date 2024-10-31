create database bd_sugestoes;
use bd_sugestoes;

create table tb_sugestoes(
id INT AUTO_INCREMENT PRIMARY KEY,
    avaliacao VARCHAR(255) NOT NULL,
    funcionalidades VARCHAR(255) NOT NULL,
    negativo VARCHAR(255),
    positivo VARCHAR(255),
    sugestao TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);