create database Linkedon;
use Linkedon;

/* ESTUDIANTES DE LA UTN */
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

/* TODOS LOS USUARIOS (ALUMNOS, ADMIN) */
create table if not exists Users(
    
    email varchar(50) not null,
    passwordUser varchar(30) not null,
    roleUser varchar(20) not null,
    
    CONSTRAINT pk_email PRIMARY KEY (email)
);

/* PUESTOS DE TRABAJO (DEVELOPER, ENGEEGIER, SR)*/
create table if not exists JobPositions(

	jobPositionId int not null,
    careerId int not null,
    descriptionJob varchar(50) not null,
    
    CONSTRAINT unq_JobPositionId UNIQUE(jobPositionId),
    /*CONSTRAINT unq_DescriptionJob UNIQUE(descriptionJob),*/
    
    CONSTRAINT pk_jobPositionId PRIMARY KEY (jobPositionId)
    /*CONSTRAINT fk_careerId FOREIGN KEY (careerId) REFERENCES Careers (careerId)*/
);

/* CARRERAS DE LA UTN */
create table if not exists Careers(

	careerId int not null,
    descriptionCareer varchar(100) not null,
    statusCareer boolean not null,
    
    CONSTRAINT pk_careerId PRIMARY KEY (careerId)
);

/* EMPRESAS */
create table if not exists Companies(
	
	nameCompany varchar(30) not null,
    address varchar(30) not null,
    phone varchar(30) not null,
    cuit varchar(30) not null,
    
    CONSTRAINT unq_NameCompany UNIQUE(nameCompany),
    CONSTRAINT unq_Address UNIQUE(address),
    CONSTRAINT unq_Phone UNIQUE(phone),
    CONSTRAINT unq_Cuit UNIQUE(cuit),    
    CONSTRAINT pk_nameCompany PRIMARY KEY (nameCompany)
);

create table if not exists CompaniesXjobPositions(

	IdCompaniesXjobPositions INT NOT NULL AUTO_INCREMENT,
    jobPositionId int not null,
    nameCompany varchar(30) not null,
    
    CONSTRAINT pk_CompaniesXjobPositions PRIMARY KEY (CompaniesXjobPositions)
);

/* OFERTAS DE TRABAJO  */
CREATE TABLE job_offers(

	id INT NOT NULL AUTO_INCREMENT, 
	salary float, 
	company_id INT NOT NULL, 
	job_position_id INT NOT NULL,
    
    CONSTRAINT unq_id UNIQUE(id),
    
	CONSTRAINT pk_job_offers PRIMARY KEY (id), 
	CONSTRAINT FK_job_offers_companies FOREIGN KEY (company_id) REFERENCES companies (id), 
	CONSTRAINT fk_job_offers_job_positions FOREIGN KEY (job_position_id) REFERENCES job_positions (id)
);

drop table job_offers;
select * from job_offers;

update Careers set descriptionCareer = "carreractive" where (careerId = 1);

drop table Companies;
select * from Companies;
select * from Companies where nameCompany = "facebook";

drop table Careers;
select * from Careers;

drop table Students;
select * from Students;

drop table Users;
select * from Users where roleUser = "admin";

drop table JobPositions;
select * from JobPositions;

INSERT INTO Users (email, passwordUser, roleUser) VALUES ("aleex.naahuel@outlook.com", "", "admin");

