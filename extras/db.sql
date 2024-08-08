USE smartpark;
DROP TABLE IF EXISTS reservas, vagas, estacionamentos, veiculos, motoristas, usuarios;
create table usuarios (
	id int auto_increment primary key,
	cpf varchar(14) not null unique,
	nome varchar(100) not null,
	email varchar(100) not null unique,
	senha varchar(100) not null,
	telefone varchar(15) unique,
	tipo_usuario int /*1 - Operador, 2 - Proprietário*/
);

create table motoristas (
	id int auto_increment not null primary key,
	cpf char(14) not null unique,
	nome varchar(100) not null,
	telefone varchar(100) not null
);

create table veiculo (
	motorista int not null,
	id int auto_increment primary key,
	cor varchar(100) not null,
	ano int,
	marca varchar(100),
	modelo varchar(100),
	categoria varchar(100),
	placa varchar(100) not null unique,
	foreign key (motorista) references motoristas(id)
);

create table estacionamentos (
	proprietario int not null,
	id integer auto_increment not null primary key,
	endereco varchar(100) not null,
	quantidade_vagas integer not null,
	foreign key (proprietario) references usuarios(id)
);

create table vagas (
	estacionamento integer not null,
	id integer auto_increment not null primary key,
	identificador_vaga varchar(100) not null,
	status varchar(100) not null, /*Disponivel, Indisponivel e Ocupada*/
	foreign key (estacionamento) references estacionamentos(id)
);

create table reservas (
	usuario integer not null,
	motorista integer not null,
	vaga integer not null,
	id integer auto_increment not null primary key,
	data_entrada date not null,
	data_saida date,
	horario_entrada date not null,
	horario_saida date,
	status varchar(100) not null, /*Em andamento, Cancelada e Finalizada*/
	foreign key (usuario) references usuarios(id),
	foreign key (motorista) references motoristas(id),
	foreign key (vaga) references vagas(id)
);