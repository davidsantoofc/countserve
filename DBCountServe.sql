create database if not EXISTS countserve CHARACTER SET utf8 COLLATE utf8_general_ci;;

use countserve;

create table cardapio (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(25) NOT NULL,
    acompanhamento VARCHAR(50),
    foto LONGBLOB,
    data DATE NOT NULL
);

create table pessoa (
	id int primary key not null auto_increment,
    nome varchar(50) not null,
    dt_nasc date not null,
    turm_num int,
    perfil enum('administrador', 'professor', 'aluno') not null,
    user_id INT REFERENCES users(id)
);

CREATE TABLE agenda (
    cardapio_id INT,
    pessoa_id INT,
    status ENUM('confirmado', 'cancelado'),
    PRIMARY KEY (cardapio_id, pessoa_id),
    FOREIGN KEY (cardapio_id) REFERENCES cardapio(id),
    FOREIGN KEY (pessoa_id) REFERENCES pessoa(id)
);