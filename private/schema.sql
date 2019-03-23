SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

/*Drop a database if you have already created one with the same name*/
DROP DATABASE IF EXISTS dinnersdirect;


CREATE DATABASE IF NOT EXISTS dinnersdirect;

USE dinnersdirect;

CREATE TABLE school (
  school_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  school_password varchar(255) NOT NULL,
  school_code varchar(3) NOT NULL,
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
                             password varchar(255) NOT NULL,
                             last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                             PRIMARY KEY (admin_id)
                           )ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE student (
                       student_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                       email_address varchar(100) NOT NULL,
                       first_name varchar (100) NOT NULL,
                       last_name varchar(100) NOT NULL,
                       phone_number varchar(20),
                       password varchar(255) NOT NULL,
                       registration_code varchar(15),
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
                      password varchar(255) NOT NULL,
                      status smallint default 0,
                      last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY(parent_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE list_of_menus (
                      menu_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                      menu_name varchar(100) NOT NULL,
                      menu_description text NOT NULL,
                      visibility smallint default 1,
                      last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY (menu_id)
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

CREATE TABLE order_detail (
  order_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  delivery_date date NOT NULL,
  total_price double(10,2) UNSIGNED NOT NULL,
  order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(order_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE item (
  item_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  item_image text NOT NULL,
  item_name text NOT NULL,
  item_price double(10,2) UNSIGNED NOT NULL,
  item_description text NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(item_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE order_item (
  order_id int(10) UNSIGNED NOT NULL,
  item_id int(10) UNSIGNED NOT NULL,
  quantity int(2) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(order_id, item_id),
  FOREIGN KEY(order_id) REFERENCES order_detail(order_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(item_id) REFERENCES item(item_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE student_order (
  student_id int(10) UNSIGNED NOT NULL,
  order_id int(10) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(student_id, order_id),
  FOREIGN KEY(student_id) REFERENCES student(student_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(order_id) REFERENCES order_detail(order_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE admin_order (
  admin_id int(10) UNSIGNED NOT NULL,
  order_id int(10) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(admin_id, order_id),
  FOREIGN KEY(admin_id) REFERENCES administrator(admin_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(order_id) REFERENCES order_detail(order_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE display_menu (
  menu_id int(10) UNSIGNED NOT NULL,
  display_id int(10) UNSIGNED NOT NULL,
  item_id int(10) UNSIGNED NOT NULL,
  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(menu_id, display_id, item_id),
  FOREIGN KEY(menu_id) REFERENCES list_of_menus(menu_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY(item_id) REFERENCES item(item_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE staff_credential (
                      staff_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                      username varchar(100) NOT NULL,
                      password varchar(255) NOT NULL,
                      last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY(staff_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP USER IF EXISTS 'dinnersdirect'@'localhost';
CREATE USER 'dinnersdirect'@'localhost' IDENTIFIED BY 'groupk';
GRANT USAGE ON *.* TO 'dinnersdirect'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `dinnersdirect`.* TO 'dinnersdirect'@'localhost';