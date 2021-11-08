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
    studentStatus boolean not null,
    
    CONSTRAINT pk_studentId PRIMARY KEY (studentId)
    /*CONSTRAINT pk_dni PRIMARY KEY (dni),
    CONSTRAINT fk_email FOREIGN KEY (email) REFERENCES Users (email)*/
);

create table if not exists Users(
    
    email varchar(50) not null,
    passwordUser varchar(30) not null,
    roleUser varchar(20) not null,
    
    CONSTRAINT pk_email PRIMARY KEY (email)
);

create table if not exists JobPositions(

	jobPositionId int not null,
    careerId int not null,
    descriptionJob varchar(30) not null,
    
    CONSTRAINT pk_jobPositionId PRIMARY KEY (jobPositionId),
    CONSTRAINT fk_careerId FOREIGN KEY (careerId) REFERENCES Careers (careerId)
);

create table if not exists Careers(

	careerId int not null,
    descriptionCareer varchar(100) not null,
    statusCareer boolean not null,
    
    CONSTRAINT pk_careerId PRIMARY KEY (careerId)
);

create table if not exists Companies(
	
	nameCompany varchar(30) not null,
    address varchar(30) not null,
    phone varchar(30) not null,
    cuit varchar(30) not null,
    
    CONSTRAINT pk_nameCompany PRIMARY KEY (nameCompany)
);

create table if not exists CompaniesXjobPositions(

	IdCompaniesXjobPositions INT NOT NULL AUTO_INCREMENT,
    jobPositionId int not null,
    nameCompany varchar(30) not null,
    
    CONSTRAINT pk_CompaniesXjobPositions PRIMARY KEY (CompaniesXjobPositions)
);

update Careers set descriptionCareer = "carreractive" where (careerId = 1);

select * from Companies;
select * from Companies where nameCompany = "facebook";

drop table Careers;
select * from Careers;

drop table Students;
select * from Students;

drop table Users;
select * from Users;

INSERT INTO Users (email, passwordUser, roleUser) VALUES ("aleex.naahuel@outlook.com", "", "admin");