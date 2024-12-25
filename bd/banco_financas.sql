CREATE DATABASE financeiro;

USE financeiro;

CREATE TABLE realizar_login(
    id_login INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL, 
    senha VARCHAR(15) NOT NULL
);

CREATE TABLE tipo(
    id_tipo INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE dado(
    id_dado INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    valor DECIMAL(6, 2) UNSIGNED NOT NULL,
    dataRealizada DATETIME NOT NULL,
    tipo_id INT UNSIGNED,
    
    FOREIGN KEY (tipo_id) REFERENCES tipo(id_tipo)
);

select * from  realizar_login;
drop table realizar_login;



/*
CREATE TABLE historico(
    dado_id,
    dado_descricao
    dado_valor
    dado_dataRealizada
    tipo_id
    login_id
); */