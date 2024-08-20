create database if not exists sistema_ponto;
use sistema_ponto;

create table funcionarios(
id int primary key auto_increment not null,
email varchar(100) unique not null,
senha varchar (50)
);
create table ponto(
id int primary key auto_increment not null,
id_funcionario int,
data_e_hora datetime,
tipo enum('entrada', 'saida'),
foreign key (id_funcionario) references funcionarios(id)
);

create table administrador(
 id int primary key auto_increment not null,
 nome varchar(100),
 senha varchar (50)
);


alter table funcionarios add column data_hora datetime;
