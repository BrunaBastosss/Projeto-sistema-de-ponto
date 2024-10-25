create database if not exists sistema_ponto;
use sistema_ponto;

create table pessoas(
 id int primary key auto_increment not null,
 nome varchar(100) not null,
 email varchar(100) unique not null,
 senha varchar (50),
 data_hora datetime,
 cpf varchar(14) unique not null,
 cep varchar(11),
 logradouro varchar(40),
 bairro varchar(20),
 cidade varchar (25),
 estado varchar(20)
 nivel_id int,
 FOREIGN KEY (nivel_id) REFERENCES nivel(id)
 
);
create table ponto(
id int primary key auto_increment not null,
id_funcionario int,
data_e_hora datetime current_timestamp,
tipo enum('entrada', 'saida'),
foreign key (id_funcionario) references pessoas(id)
);

create table nivel( 
id int primary key auto_increment not null,
nivel varchar(40) not null
);


describe pessoas;

ALTER TABLE nivel MODIFY nivel varchar(40) not null;
ALTER TABLE pessoas ADD COLUMN nivel_id INT;

ALTER TABLE pessoas
  ADD CONSTRAINT fk_nivel
FOREIGN KEY (nivel_id)
REFERENCES nivel(id);