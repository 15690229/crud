create database if not exists inventario;

use inventario;
create table bebidas (
id int auto_increment primary key,
marca varchar(30) not null,
sabor varchar(30) not null,
tamano varchar(10) not null,
cantidad varchar(4) not null
);

insert into `bebidas`(`id`, `marca`, `sabor`, `tamano`, `cantidad`) values (1, 'Pepsi', 'seven', '600ml', '100');



