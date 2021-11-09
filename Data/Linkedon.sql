create database Linkedon;
use Linkedon;

create table if not exists careers(

	careerId int not null,
    descriptionCareer varchar(100) not null,
    statusCareer boolean not null,
    CONSTRAINT pk_careers PRIMARY KEY (careerId)
);

create table if not exists students(
	
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
    CONSTRAINT pk_students PRIMARY KEY (studentId),
    CONSTRAINT unq_email UNIQUE (email), 
    CONSTRAINT fk_students_career FOREIGN KEY (careerId) REFERENCES careers (careerId)
);

create table if not exists users(
    
    email varchar(50) not null,
    passwordUser varchar(30) not null,
    roleUser varchar(20) not null,
    CONSTRAINT pk_users PRIMARY KEY (email)
);

create table if not exists jobPositions(

	jobPositionId int not null,
    careerId int not null,
    descriptionJob varchar(30) not null,
    CONSTRAINT pk_jobPositions PRIMARY KEY (jobPositionId),
    CONSTRAINT fk_jobPositions_careers FOREIGN KEY (careerId) REFERENCES careers (careerId)
);

create table if not exists companies(
	
	nameCompany varchar(30) not null,
    address varchar(30) not null,
    phone varchar(30) not null,
    cuit varchar(30) not null,
    CONSTRAINT pk_companies PRIMARY KEY (nameCompany), 
    CONSTRAINT unq_companies UNIQUE (cuit) 
);

create table if not exists jobOffers(

	id INT NOT NULL AUTO_INCREMENT,
    salary float, 
    jobPositionId int not null,
    nameCompany varchar(30) not null,
    CONSTRAINT pk_jobOffers PRIMARY KEY (id), 
    CONSTRAINT fk_jobOffers_companies FOREIGN KEY (nameCompany) REFERENCES companies (nameCompany), 
	CONSTRAINT fk_jobOffers_jobPositions FOREIGN KEY (jobPositionId) REFERENCES jobPositions (jobPositionId) 
);

CREATE TABLE applications (
	id INT NOT NULL AUTO_INCREMENT, 
	jobOffer_id INT NOT NULL, 
	studentId INT NOT NULL, 
	CONSTRAINT pk_applications PRIMARY KEY (id), 
	CONSTRAINT fk_applications_jobOffers FOREIGN KEY (jobOffer_id) REFERENCES jobOffers (id), 
	CONSTRAINT fk_applications_students FOREIGN KEY (studentId) REFERENCES students (studentId) 
);