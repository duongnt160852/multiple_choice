create database multiple_choice;

use multiple_choice;

create table admins (
	id int(10) unsigned not null auto_increment primary key,
	name varchar(255) not null,
    username varchar(255) not null unique,
    password varchar(255) not null,
	remember_token varchar(100) 

)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


create table subjects(
	id int(10) unsigned not null auto_increment primary key,
    name varchar(255) not null unique
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


create table topics(
	id int(10) unsigned not null auto_increment primary key,
    name varchar(255) not null unique,
    idSubject int(10) unsigned not null,
    foreign key(idSubject) references subjects(id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table questions(
	id int(10) unsigned not null auto_increment primary key,
    name text not null,
    A text not null,
    B text not null,
    C text not null,
    D text not null,
    answer char(1) not null,
    idTopic int(10) unsigned not null,
    level int(1) not null,
    comment text null default null,
    foreign key(idTopic) references topics(id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table exams(
idOrder int(10) unsigned not null auto_increment primary key,
	id int(10) unsigned not null,
    code int(10) unsigned not null,
    idQuestion int(10) unsigned not null,
idTopic int(10) unsigned not null,
    name varchar(255) not null,
	time int not null,
unique(id,code,idQuestion),
    foreign key(idQuestion) references questions(id),
foreign key(idTopic) references questions(idTopic)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table users(
	id int(10) unsigned not null auto_increment primary key,
    name varchar(255) not null,
    username varchar(255) not null unique,
    email varchar(255) null default null,
    DoB date not null,
    password varchar(255) not null,
    password1 varchar(255) not null,
    status varchar(255) default '0',
    time datetime null default null,
    count_true int null default null,
    total int null default null,
    mark float null default null,
    idExam int(10) unsigned not null,
    code int(10) unsigned not null,
remember_token varchar(100),
    foreign key(idExam,code) references exams(id,code)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    
