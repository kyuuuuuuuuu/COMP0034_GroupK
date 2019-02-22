SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

/*Drop a database if you have already created one with the same name*/
DROP DATABASE IF EXISTS dinnersdirect;


CREATE DATABASE IF NOT EXISTS dinnersdirect;

USE dinnersdirect;

CREATE TABLE school (
  school_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  school_name varchar(100) NOT NULL,
  school_address varchar (265) NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (school_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE administrator (
                             admin_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                             email_address varchar(100) NOT NULL,
                             first_name varchar (100) NOT NULL,
                             last_name varchar(100) NOT NULL,
                             phone_number varchar(20),
                             password varchar(25) NOT NULL,
                             last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                             PRIMARY KEY (admin_id)
                           )ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE student (
                       student_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                       email_address varchar(100) NOT NULL,
                       first_name varchar (100) NOT NULL,
                       last_name varchar(100) NOT NULL,
                       phone_number varchar(20),
                       password varchar(25) NOT NULL,
                       status smallint default 0,
                       last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                       PRIMARY KEY(student_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE parent (
                      parent_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                      email_address varchar(100) NOT NULL,
                      first_name varchar (100) NOT NULL,
                      last_name varchar(100) NOT NULL,
                      phone_number varchar(20),
                      password varchar(25) NOT NULL,
                      status smallint default 0,
                      last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY(parent_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE school_admin (
  school_id int(10) UNSIGNED NOT NULL,
  admin_id int(10) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (school_id, admin_id),
  FOREIGN KEY (school_id) REFERENCES school(school_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (admin_id) REFERENCES administrator(admin_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE admin_student (
  student_id int(10) UNSIGNED NOT NULL,
  admin_id int(10) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (admin_id, student_id),
  FOREIGN KEY(admin_id) REFERENCES administrator(admin_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(student_id) REFERENCES student(student_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE student_parent (
  student_id int(10) UNSIGNED NOT NULL,
  parent_id int(10) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(student_id, parent_id),
  FOREIGN KEY(student_id) REFERENCES student(student_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(parent_id) REFERENCES parent(parent_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*
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
  quantity int(2),
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
  FOREIGN KEY(admin_id) REFERENCES school_administrator(admin_id));*/
DROP USER IF EXISTS 'dinnersdirect'@'localhost';
CREATE USER 'dinnersdirect'@'localhost' IDENTIFIED BY 'groupk';
GRANT USAGE ON *.* TO 'dinnersdirect'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `dinnersdirect`.* TO 'dinnersdirect'@'localhost';