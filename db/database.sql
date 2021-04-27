create database minichat;

use minichat;

create table Message (
id INT NOT NULL AUTO_INCREMENT,
nickname VARCHAR(255) NOT NULL,
content VARCHAR(255) NOT NULL,
PRIMARY KEY(id)
);

insert into Message(nickname, content) values ('toto', 'lorem ipsum dolor amet 1');

create table User (
nickname VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
PRIMARY KEY(nickname)
);

insert into User(nickname, password) values ('toto','secret');