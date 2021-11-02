create database Linkedon;
use Linkedon;

create table if not exists Students(
	
    studentId int not null,
    careerId int not null,
    firstName varchar(30) not null,
    lastName varchar(30) not null,
    dni varchar(30) not null,
    fileNumber varchar(30) not null,
    gender varchar(30) not null,
    birthDate varchar(30) not null,
    email varchar(50) not null,
    phoneNumber varchar(20) not null,
    studentStatus boolean not null
);

create table if not exists JobPositions(

	jobPositionId int not null,
    careerId int not null,
    descriptionJob varchar(30) not null
);

create table if not exists Careers(
	careerId int not null,
    descriptionCareer varchar(100) not null,
    statusCareer boolean not null
);

create table if not exists Companies(
	
	nameCompany varchar(30) not null,
    address varchar(30) not null,
    phone varchar(30) not null,
    cuit varchar(30) not null
);

insert into students (firstname) values ("Alex");
insert into students (firstname) values ("Rina");
insert into students (firstname) values ("Kevin");
insert into students (firstname) values ("Pedro");

select * from students;

drop table students;