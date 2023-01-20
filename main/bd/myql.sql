CREATE DATABASE estoque

CREATE TABLE produtos(
id int not null AUTO_INCREMENT PRIMARY KEY ,
codigo VARCHAR (100),
produto VARCHAR (100),
preco DECIMAL (9,2),
quantidade int(100),
quantidade_min int(100),
img VARCHAR(200)
);

CREATE TABLE usuarios(
id int not null AUTO_INCREMENT PRIMARY KEY ,
nome VARCHAR(100),
email VARCHAR(100),
senha VARCHAR(100),
img VARCHAR(200)
);