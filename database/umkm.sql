create table users (
    id int auto_increment primary key,
    username varchar(255) not null,
    password varchar(255) not null,
    role varchar(255) not null
);

create table super_admin (
    id int auto_increment primary key,
    name varchar(255) not null,
    email varchar(255) not null,
    phone varchar(255) not null,
    address varchar(255) not null,
)