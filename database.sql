create database phone_book;

create table contacts (
  contact_id  int(11) auto_increment primary key,
  contact_name varchar(255) not null,
  contact_phone varchar(50) not null
);

use phone_book;
