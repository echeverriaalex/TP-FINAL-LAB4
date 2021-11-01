create database Linkedon;
use Linkedon;

create table if not exists students(
	
    firstname varchar(50) not null
 
	
);

insert into students (firstname) values ("Alex");
insert into students (firstname) values ("Rina");
insert into students (firstname) values ("Kevin");
insert into students (firstname) values ("Pedro");

select * from students;

drop table students;