CREATE DATABASE IF NOT EXISTS dinnersdirect;

USE dinnersdirect;

CREATE TABLE school (
school_id int(10) NOT NULL,
school_name varchar(100) NOT NULL,
school_address varchar (265) NOT NULL,
PRIMARY KEY (school_id)
);

CREATE TABLE school_administrator (
admin_id int(10) NOT NULL,
email_address varchar(100) NOT NULL,
first_name varchar (100) NOT NULL,
last_name varchar(100) NOT NULL,
phone_number int(20),
school_id int(10),
PRIMARY KEY (admin_id),
FOREIGN KEY (school_id) REFERENCES school(school_id)
);

CREATE TABLE student (
student_id int(10) NOT NULL,
email_address varchar(100) NOT NULL,
first_name varchar (100) NOT NULL,
last_name varchar(100) NOT NULL,
phone_number int(20),
admin_id int (10),
PRIMARY KEY(student_id),
FOREIGN KEY(admin_id) REFERENCES school_administrator(admin_id)
);

CREATE TABLE parent (
parent_id int(10) NOT NULL,
email_address varchar(100) NOT NULL,
first_name varchar (100) NOT NULL,
last_name varchar(100) NOT NULL,
phone_number int(20),
student_id int(10),
PRIMARY KEY(parent_id),
FOREIGN KEY(student_id) REFERENCES student(student_id)
);

CREATE TABLE item (
item_id int(10) NOT NULL,
item_image blob,
item_name varchar(100) NOT NULL,
price_per_unit double(10,2),
PRIMARY KEY(item_id)
);

CREATE TABLE order_detail (
order_id int(10),
item_id int(10),
quantities int(2),
dietary_option varchar(255),
delivery_date date,
sub_total double(10,2),
vat double(10,2),
total_price double(10,2),
order_date datetime,
student_id int(10),
parent_id int(10),
admin_id int(10),
PRIMARY KEY(order_id),
FOREIGN KEY(student_id) REFERENCES student(student_id),
FOREIGN KEY(parent_id) REFERENCES parent(parent_id),
FOREIGN KEY(admin_id) REFERENCES school_administrator(admin_id)
);