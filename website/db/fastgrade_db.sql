drop table professor;
drop table student;
drop table admin;
drop table ue;
drop table subject;
drop table exercise;
drop table enum_language;
drop table follow;
drop table grading;
drop table answer;
drop table teach;

create table professor(
	professor_id				int					primary key,
	firstname					varchar(40)			not null,
	lastname					varchar(40)			not null,
	mail						varchar(50)			not null,
	passwd						varchar(50)			not null,
	account_status				varchar(10)			not null
);
create table student(
	student_id					int					primary key,
	firstname					varchar(40)			not null,
	lastname					varchar(40)			not null,
	mail						varchar(50)			not null,
	passwd						varchar(50)			not null,
	account_status				varchar(10)			not null
);
create table admin(
	admin_id					int					primary key auto_increment,
	firstname					varchar(40)			not null,
	lastname					varchar(40)			not null,
	mail						varchar(50)			not null,
	passwd						varchar(50)			not null,
	account_status				varchar(10)			not null
);
create table ue(
	ue_code						varchar(20)			primary key,
	promotion					int					not null
);
create table subject(
	ue_code						varchar(20)			references ue(ue_code)
								on update cascade
								on delete cascade,
	subject_number				int					not null,
	statement					varchar(8000)		not null,
	constraint					pk_subject			primary key(ue_code, subject_number)
);
create table enum_language(
	language_name				varchar(20)			primary key
);
create table exercise(
	ue_code						varchar(20)			references ue(ue_code)
								on update cascade
								on delete cascade,
	subject_number				int					references subject(subject_number)
								on update cascade
								on delete cascade,
	exercise_number				int					not null,
	language_name				varchar(20)			references enum_language(language_name)
								on update cascade
								on delete cascade,
	statement					varchar(8000)		not null,
	deadline_date				date				not null,
	attributed_points			float(2,1)			not null,
	answer						varchar(3000)		not null,
	constraint					pk_exercise			primary key(ue_code, subject_number, exercise_number)
);
create table follow(
	student_id					int					references student(student_id)
								on update cascade
								on delete cascade,
	ue_code						varchar(20)			references ue(ue_code)
								on update cascade
								on delete cascade,
	constraint					pk_follow			primary key(student_id, ue_code)
);
create table grading(
	professor_id				int					references professor(professor_id)
								on update cascade
								on delete cascade,
	student_id					int					references student(student_id)
								on update cascade
								on delete cascade,
	ue_code						varchar(20)			references ue(ue_code)
								on update cascade
								on delete cascade,
	subject_number				int					references subject(subject_number)
								on update cascade
								on delete cascade,
	compilation_result			varchar(5000),
	exec_result					varchar(5000),
	grade						float(2,1)			not null,
	grade_visualisation_right	varchar(10)			not null,
	grade_visualisation_date	date				not null,
	constraint					pk_grading			primary key(professor_id, student_id, ue_code, subject_number)
);
create table answer(
	student_id					int					references student(student_id)
								on update cascade
								on delete cascade,
	ue_code						varchar(20)			references ue(ue_code)
								on update cascade
								on delete cascade,
	subject_number				int					references subject(subject_number)
								on update cascade
								on delete cascade,
	exercise_number				int					references exercise(exercise_number)
								on update cascade
								on delete cascade,
	student_answer				varchar(5000),
	constraint					pk_answer			primary key(student_id, ue_code, subject_number, exercise_number)
);
create table teach(
	professor_id				int					references professor(professor_id)
								on update cascade
								on delete cascade,
	ue_code						varchar(20)			references ue(ue_code)
								on update cascade
								on delete cascade,
	constraint					pk_teach			primary key(professor_id, ue_code)
);

insert into professor (professor_id,firstname, lastname, mail,passwd,account_status) values (3563456,'Viviane-Amande','Cohen','Cohen@Cohen.fr','Cohen','true');
insert into professor (professor_id,firstname, lastname, mail,passwd,account_status) values (3456433,'Armel','Adam','Adam@Cohen.fr','Adam','true');
insert into professor (professor_id,firstname, lastname, mail,passwd,account_status) values (6545634,'Abraham','Claudel','Claudel@Cohen.fr','Claudel','true');
insert into professor (professor_id,firstname, lastname, mail,passwd,account_status) values (4563466,'Aubin','Rachid','Rachid@Cohen.fr','Rachid','true');
insert into professor (professor_id,firstname, lastname, mail,passwd,account_status) values (3556456,'Léa','Guyard','Guyard@Cohen.fr','Guyard','true');

insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (23452345,'Amande-Yolande','Auger','Auger@Cohen.fr','Auger','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (45234554,'Isabeau','Brossard','Brossard@Cohen.fr','Brossard','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (43534534,'Thomas','Schaeffer','Schaeffer@Cohen.fr','Schaeffer','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34523453,'Philibert','Petit','Petit@Cohen.fr','Petit','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34521453,'Orlane','Madi','Madi@Cohen.fr','Madi','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34529455,'Gertrude','Reymond','Reymond@Cohen.fr','Reymond','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34534534,'Laure','Derouet','Derouet@Cohen.fr','Derouet','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34523455,'Ludovic','Monti','Monti@Cohen.fr','Monti','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34529453,'Eugène','Attal','Attal@Cohen.fr','Attal','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (32452345,'Bertrand','Bony','Bony@Cohen.fr','Bony','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (23453345,'Coralie-Rolande','Lemercier','Lemercier@Cohen.fr','Lemercier','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34522455,'Thaïs','Herbaut','Herbaut@Cohen.fr','Herbaut','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34527455,'Maurice','Madi','Madi@Cohen.fr','Madi','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (34566455,'Adam-Georges','Bouquet','Bouquet@Cohen.fr','Bouquet','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (78878999,'Faustine','Corbin','Corbin@Cohen.fr','Corbin','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (12312312,'Abdon-Paulette','Brion','Brion@Cohen.fr','Brion','true');
insert into student (student_id,firstname, lastname, mail,passwd,account_status) values (23232323,'Primerose','Genin','Genin@Cohen.fr','Genin','true');

insert into admin (firstname, lastname, mail,passwd,account_status) values ('Guilhemine','Cuvillier','Cuvillier@Cohen.fr','Cuvillier','true');
insert into admin (firstname, lastname, mail,passwd,account_status) values ('Perrine','Masson','Masson@Cohen.fr','Masson','true');

insert into ue (ue_code, promotion) values ('3i001', 2020);
insert into ue (ue_code, promotion) values ('3i002', 2020);

insert into subject (ue_code, subject_number, statement) values ('3i001', 1, 'C : helloworld');
insert into subject (ue_code, subject_number, statement) values ('3i001', 2, 'C : structure de controle');
insert into subject (ue_code, subject_number, statement) values ('3i001', 3, 'C : fonctions');
insert into subject (ue_code, subject_number, statement) values ('3i002', 1, 'JAVA : helloworld');

insert into enum_language (language_name) values ('C');
insert into enum_language (language_name) values ('JAVA');

insert into exercise (ue_code,subject_number,exercise_number,language_name,statement,deadline_date,attributed_points,answer) values ('3i001',1,1,'C','Réaliser un progamme qui affiche le message "hello world!"','2020-02-07',5.0,'helloworld!');
insert into exercise (ue_code,subject_number,exercise_number,language_name,statement,deadline_date,attributed_points,answer) values ('3i002',1,1,'JAVA','Réaliser un progamme qui affiche le message "hello world!"','2020-02-07',5.0,'helloworld!');

insert into follow (student_id,ue_code) values (43534534,'3i001');
insert into follow (student_id,ue_code) values (43534534,'3i002');
insert into follow (student_id,ue_code) values (34529455,'3i001');
insert into follow (student_id,ue_code) values (34529455,'3i002');
insert into follow (student_id,ue_code) values (32452345,'3i001');
insert into follow (student_id,ue_code) values (32452345,'3i002');
insert into follow (student_id,ue_code) values (34566455,'3i001');
insert into follow (student_id,ue_code) values (34566455,'3i002');
insert into follow (student_id,ue_code) values (78878999,'3i001');
insert into follow (student_id,ue_code) values (78878999,'3i002');
insert into follow (student_id,ue_code) values (23232323,'3i001');
insert into follow (student_id,ue_code) values (23232323,'3i002');
insert into follow (student_id,ue_code) values (23453345,'3i001');
insert into follow (student_id,ue_code) values (23453345,'3i002');
insert into follow (student_id,ue_code) values (34522455,'3i001');
insert into follow (student_id,ue_code) values (34522455,'3i002');
insert into follow (student_id,ue_code) values (34523453,'3i001');
insert into follow (student_id,ue_code) values (34523453,'3i002');

insert into grading (professor_id,student_id,ue_code,subject_number,compilation_result,exec_result,grade,grade_visualisation_right,grade_visualisation_date) values (3563456,43534534,'3i001',1,'','hello world!',5.0,'true','2020-02-05');

insert into answer (student_id,ue_code,subject_number,exercise_number,student_answer) values (43534534,'3i001',1,1,'#include stdio.h; void main() { printf("hello world!");}');

insert into teach (professor_id,ue_code) values (3563456,'3i001');
insert into teach (professor_id,ue_code) values (3563456,'3i002');
insert into teach (professor_id,ue_code) values (3456433,'3i001');
insert into teach (professor_id,ue_code) values (3456433,'3i002');
insert into teach (professor_id,ue_code) values (6545634,'3i001');
insert into teach (professor_id,ue_code) values (6545634,'3i002');
insert into teach (professor_id,ue_code) values (4563466,'3i001');
insert into teach (professor_id,ue_code) values (4563466,'3i002');
insert into teach (professor_id,ue_code) values (3556456,'3i001');
insert into teach (professor_id,ue_code) values (3556456,'3i002');