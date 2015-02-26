-- MySQL database for appointment application
-- Generation Time: Feb 25, 2015 at 06:11 PM
-- author: Angele Demeurant
-- Create all the databases, create trigger, insert into the databases



-- -----------------------------------------------------------
-- create all the databases
create table user(
	tnumber varchar(9) primary key,
	first_name varchar(30) not null,
	last_name varchar(30) not null,
	pin int(5),
	register_date datetime,
	date_of_birth date,
	address1 varchar(100),
	address2 varchar(100),
	city varchar(35),
	county varchar(35),
	course varchar(100),
	type varchar(100),
	disability_detail varchar(15),
	contact_number varchar(14),
	specifications varchar(500)
);

create table connection(
	id int(4) unsigned auto_increment primary key,
	tnumber varchar(9),
	log_in datetime,
	log_out datetime
);

alter table connection 
add constraint fk_tnumber
foreign key(tnumber)
references user(tnumber)
on delete cascade;

create table service(
	name varchar(30) primary key,
	email_address varchar(30),
password varchar(30)
);


create table appointment(
	id int(4) unsigned auto_increment primary key,
	tnumber varchar(9),
	service varchar(30),
	date_request datetime,
	date_appointment datetime,
	state varchar(10)
);


alter table appointment
add constraint fk_app
foreign key(tnumber)
references user(tnumber)
on delete cascade;

alter table appointment
add constraint fk_service
foreign key(service)
references service(name)
on delete cascade;

create table admin(
	username varchar(30) not null,
	password varchar(30) not null
);

-- -----------------------------------------------------------
-- triggers
DROP TRIGGER IF EXISTS trigger_app;
CREATE TRIGGER trigger_app BEFORE INSERT ON appointment
FOR EACH ROW 
begin 
IF new.tnumber not regexp '[tT][0-9]{8}' THEN	
	 SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid Tnumber';
end if;
set new.tnumber=lower(new.tnumber);
if new.register_date is null then
	set new.register_date = sysdate();
end if;
if new.pin is null then 
set new.pin=right(new.tnumber,5);
end if;
end

DROP TRIGGER IF EXISTS trigger_app;
CREATE TRIGGER trigger_app BEFORE INSERT ON appointment
FOR EACH ROW 
begin
if new.date_request is null then
	set new.date_request = sysdate();
end if;
end

-- -----------------------------------------------------------
-- insert
insert into user values('t00178764','aurelien','bigois',null,null,'1993-11-03','134 TTCA','Maine Street','Tralee','Kerry','Bachelor of Science in Computing with Multimedia', 'None', '{1,2,3}', '0894542050', 'Le stupeflip CROU ne mourra jamais');

insert into user values('t00178747','angele','demeurant',null,null,'1994-06-10','134 TTCA','Maine Street','Tralee','Kerry','Bachelor of Science in Computing with Multimedia', 'None', '{1,2,3}', '0894542050', 'POUET');

insert into service values('Dyslexia Student Services','dyslexia@ittralee.ie','testproj15dysl'), ('Counsellor Student Services','counsellor@ittralee.ie','testproj15coun'), ('Access Student Services','access@ittralee.ie','testproj15accs');

insert into appointment values(null,'t00178764','Dyslexia Student Services',null,'2015-02-10 14:30:00','Accepted');

insert into admin values('webmasterAur','iliketrains42'),('webmasterAng','ilikethesun23');
