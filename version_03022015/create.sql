create table user(
	tnumber varchar(9) primary key,
	first_name varchar(30) not null,
	last_name varchar(30) not null,
	pin int(5),
	register_date datetime,
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
	email_address varchar(30)
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
add constraint fk_tnumber
foreign key(tnumber)
references user(tnumber)
on delete cascade;

alter table appointment
add constraint fk_service
foreign key(service)
references service(name)
on delete cascade;

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
