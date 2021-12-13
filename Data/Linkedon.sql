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
    passwordStudent varchar(50) not null,
    roleStudent varchar(20) not null,
	CONSTRAINT pk_students PRIMARY KEY (studentId)
	/*  CONSTRAINT unq_email UNIQUE (email), CONSTRAINT unq_studentId UNIQUE (studentId),
    CONSTRAINT unq_dni UNIQUE (dni), CONSTRAINT unq_fileNumber UNIQUE (fileNumber),
    CONSTRAINT fk_students_career FOREIGN KEY (careerId) REFERENCES careers (careerId)*/
);

/* TODOS LOS USUARIOS (ALUMNOS, ADMIN) */
create table if not exists Users(
    
    email varchar(50) not null,
    passwordUser varchar(30) not null,
    roleUser varchar(20) not null,
    CONSTRAINT pk_users PRIMARY KEY (email)
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
    email varchar(30) not null,
    passwordCompany varchar(30) not null,
    roleCompany varchar(20) not null,
    
    CONSTRAINT unq_NameCompany UNIQUE(nameCompany),
    CONSTRAINT unq_Address UNIQUE(address),
    CONSTRAINT unq_Phone UNIQUE(phone),
    CONSTRAINT unq_Cuit UNIQUE(cuit),    
    CONSTRAINT pk_nameCompany PRIMARY KEY (nameCompany)
);

create table if not exists jobOffers(	
    salary float,
    nameCompany varchar(30) not null,
    jobPositionId int not null,
    photo varchar(300) not null,
    id INT NOT NULL AUTO_INCREMENT,
    creationDate varchar(50) not null,
    culmination varchar(50) not null,
    CONSTRAINT unq_id UNIQUE(id)    
    /*
    CONSTRAINT pk_jobOffers PRIMARY KEY (id),
    CONSTRAINT fk_jobOffers_companies FOREIGN KEY (nameCompany) REFERENCES Companies (nameCompany), 
    CONSTRAINT fk_jobOffers_jobPositions FOREIGN KEY (jobPositionId) REFERENCES JobPositions (jobPositionId)
    */
);

CREATE TABLE applications (
	id INT NOT NULL AUTO_INCREMENT, 
	jobOfferId INT NOT NULL, 
	studentId INT NOT NULL,
	CONSTRAINT pk_applications PRIMARY KEY (id)
	/*CONSTRAINT fk_applications_jobOffers FOREIGN KEY (jobOfferId) REFERENCES jobOffers (id), 
	CONSTRAINT fk_applications_students FOREIGN KEY (studentId) REFERENCES Students (studentId)*/
);

drop table jobOffers;
select * from jobOffers;
select * from jobOffers where nameCompany like '%enture%' or salary like '%6900%';
insert into jobOffers (salary, nameCompany, jobPositionId, photo, culmination) values (5000,"Facebook", 8,"photo","2 de febrero");
insert into jobOffers (salary, nameCompany, jobPositionId, photo, culmination) values (6000,"Twitter", 5,"photo","12 de mayo");
insert into jobOffers (salary, nameCompany, jobPositionId, photo, culmination) values (7000,"Globant", 6,"photo","22 de marzo");

drop table applications;
select * from applications;
select * from applications where jobOfferId = 2;
insert into applications(jobOfferId, studentId) values (2, 9599);
insert into applications(jobOfferId, studentId) values (2, 2456);
insert into applications(jobOfferId, studentId) values (2, 8458);
insert into applications(jobOfferId, studentId) values (1234, 1234);
insert into applications(jobOfferId, studentId) values (1234, 1111);
insert into applications(jobOfferId, studentId) values (1234, 2222);
insert into applications(jobOfferId, studentId) values (1234, 3333);

insert into applications(jobOfferId, studentId) values (4567, 4567);
insert into applications(jobOfferId, studentId) values (4567, 4444);
insert into applications(jobOfferId, studentId) values (4567, 5555);
insert into applications(jobOfferId, studentId) values (4567, 6666);

insert into applications(jobOfferId, studentId) values (7890, 7890);
insert into applications(jobOfferId, studentId) values (7890, 7777);
insert into applications(jobOfferId, studentId) values (7890, 8888);
insert into applications(jobOfferId, studentId) values (7890, 9999);

drop table Companies;
select * from Companies;
select * from Companies where nameCompany = "facebook";

/*drop table Careers;
select * from Careers;*/

drop table Students;
select * from Students;
DELETE FROM Students WHERE (studentId = 620 );
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(123, 1, "Alex", "Echeverria", "40885197", "789456", "male", "1-3-1998", "alexecheverria@hotmail.com", "223-512-7491", true, "echeverria", "student");                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(456, 1, "Kevin", "Raffa", "5458110", "212320", "male", "5-8-2000", "kevinraffa@hotmail.com", "223-9892-7491", true, "raffa", "student");                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(789, 2, "Rina", "Grasso", "5200569", "12387", "female", "15-3-2000", "rinagrasso@hotmail.com", "223-639-7491", true, "grasso", "student");                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(963, 2, "Pedro", "Victorel", "566210", "789456", "male", "1-3-1998", "pedrovictorel@hotmail.com", "223-512-7491", true, "victorel", "student");                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(741, 3, "Jose", "Navarro", "985020", "148910", "male", "11-3-1998", "josenavarro@hotmail.com", "223-632-7491", false, "navarro", "student");                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(555, 3, "Lucio", "Hernandez", "105849898", "63215", "male", "1-3-1998", "luciohernandez@hotmail.com", "223-987-7491", true, "hernandez", "student");                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(666, 3, "Maria", "Antonieta", "588410", "9631", "female", "12-6-1980", "mariaantonieta@hotmail.com", "223-711-7491", false, "antonieta", "student");
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(5225, 3, "Rina Paola", "Antonieta", "588410", "9631", "female", "12-6-1980", "rina2300@hotmail.com", "223-711-7491", true, "antonieta", "student");
                    
insert into Students(studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) values 
					(112006, 1, "Alex Nahuel", "Echeverria", "40885197", "7896659456", "male", "1-3-1998", "alexnahuelecheverria@gmail.com", "223-512-7491", true, "echeverria", "student"); 
/* todos los estudiantes de arriba ya estan registrados*/

drop table Users;
select * from Users;
select * from Users where email like '%jose%' or roleUser like '%admin%';

drop table JobPositions;
select * from JobPositions;
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(1,1,"web Developer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(2,2,"Android developer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(3,3,"Ios developer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(4,4,"Software engineer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(5,5,"front-end developer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(6,2,"Kotlin developer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(7,1,"full stack developer");
insert into JobPositions (jobPositionId, careerId, descriptionJob)values(8,1,"PHP developer");

drop table Careers;
select * from Careers;
insert into Careers (careerId, descriptionCareer, statusCareer)values(1,"Web developer",true);
insert into Careers (careerId, descriptionCareer, statusCareer)values(2,"Android mobile developer",true);
insert into Careers (careerId, descriptionCareer, statusCareer)values(3,"IOS mobile developer",true);
insert into Careers (careerId, descriptionCareer, statusCareer)values(4,"Software Engineering",true);
insert into Careers (careerId, descriptionCareer, statusCareer)values(5,"Front-end technical developer",true);
insert into Careers (careerId, descriptionCareer, statusCareer)values(6,"Textile engineering",false);
insert into Careers (careerId, descriptionCareer, statusCareer)values(7,"Environmental engineering",false);
insert into Careers (careerId, descriptionCareer, statusCareer)values(8,"University Technician in Administration",false);







drop database linkedon;

INSERT INTO Users (email, passwordUser, roleUser) VALUES ("aleex.naahuel@outlook.com", "", "admin");
update Careers set descriptionCareer = "carreractive" where (careerId = 1);