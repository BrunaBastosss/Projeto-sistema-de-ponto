create database if not exists sistema_ponto;
use sistema_ponto;

create table funcionarios(
id int primary key auto_increment not null,
nome varchar(100),
email varchar(100) unique not null,
senha varchar (50),
 data_hora datetime,
 cpf varchar(11) unique,
 endereco varchar(60)
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
create table nivel( 
id int primary key auto_increment not null,
id_administrador int,
id_funcionarios int,
nivel varchar(45),
foreign key (id_administrador)  references administrador(id),
foreign key (id_funcionarios) references funcionarios(id)
);
describe funcionarios;


