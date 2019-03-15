SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

USE dinnersdirect;
INSERT INTO `school` (`school_id`,`school_password`, `school_code`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'UCL', 'UCL123', 'UCL', 'Gower St, Bloomsbury, London WC1E 6BT', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`,`school_password`, `school_code`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'LSE', 'LSE123', 'LSE', 'Houghton St, London WC2A 2AE', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`,`school_password`, `school_code`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'King', 'KCL123', 'KCL', 'Strand, London WC2R 2LS', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`,`school_password`, `school_code`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'City', 'CUL123', 'CUL', 'Northampton Square, Clerkenwell, London EC1V 0HB', CURRENT_TIMESTAMP), (NULL, 'QMUL', 'QMUL123', 'QML', 'Mile End Rd, Bethnal Green, London E1 4NS', CURRENT_TIMESTAMP);

INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'aparent@gmail.com', 'Alexander', 'Abert', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'bparent@gmail.com', 'Brenda', 'Barrack', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'cparent@gmail.com', 'Camila', 'Carter', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'dparent@gmail.com', 'David', 'Dalton', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'eparent@gmail.com', 'Edison', 'Eastwood', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student@ucl.ac.uk', 'Anthony', 'Abert', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student@lse.ac.uk', 'Birk', 'Barrack', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student@king.ac.uk', 'Cathy', 'Carter', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student@city.ac.uk', 'Debbie', 'Dalton', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student@qmul.ac.uk', 'Eva', 'Eastwood', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO `administrator` (`admin_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `last_update`) VALUES (NULL, 'admin@ucl.ac.uk', 'Michael', 'Arthur', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', CURRENT_TIMESTAMP);
INSERT INTO `administrator` (`admin_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `last_update`) VALUES (NULL, 'admin@lse.ac.uk', 'Sidney', 'Webb', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', CURRENT_TIMESTAMP);
INSERT INTO `administrator` (`admin_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `last_update`) VALUES (NULL, 'admin@king.ac.uk', 'Ed', 'Byrne', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', CURRENT_TIMESTAMP);
INSERT INTO `administrator` (`admin_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `last_update`) VALUES (NULL, 'admin@city.ac.uk', 'Paul', 'Curran', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', CURRENT_TIMESTAMP);
INSERT INTO `administrator` (`admin_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `last_update`) VALUES (NULL, 'admin@qmul.ac.uk', 'Colin', 'Bailey', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', CURRENT_TIMESTAMP);

INSERT INTO admin_student (student_id, admin_id) VALUES ('1', '1');
INSERT INTO admin_student (student_id, admin_id) VALUES ('2', '2');
INSERT INTO admin_student (student_id, admin_id) VALUES ('3', '3');
INSERT INTO admin_student (student_id, admin_id) VALUES ('4', '4');
INSERT INTO admin_student (student_id, admin_id) VALUES ('5', '5');

INSERT INTO student_parent (student_id, parent_id) VALUES ('1', '1');
INSERT INTO student_parent (student_id, parent_id) VALUES ('2', '2');
INSERT INTO student_parent (student_id, parent_id) VALUES ('3', '3');
INSERT INTO student_parent (student_id, parent_id) VALUES ('4', '4');
INSERT INTO student_parent (student_id, parent_id) VALUES ('5', '5');

INSERT INTO school_admin (admin_id, school_id) VALUES ('1', '1');
INSERT INTO school_admin (admin_id, school_id) VALUES ('2', '2');
INSERT INTO school_admin (admin_id, school_id) VALUES ('3', '3');
INSERT INTO school_admin (admin_id, school_id) VALUES ('4', '4');
INSERT INTO school_admin (admin_id, school_id) VALUES ('5', '5');

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student1@ucl.ac.uk', 'Anthony1', 'Abert1', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student1@lse.ac.uk', 'Birk1', 'Barrack1', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student1@king.ac.uk', 'Cathy1', 'Carter1', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student1@city.ac.uk', 'Debbie1', 'Dalton1', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student1@qmul.ac.uk', 'Eva1', 'Eastwood1', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student2@ucl.ac.uk', 'Anthony2', 'Abert2', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student2@lse.ac.uk', 'Birk2', 'Barrack2', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student2@king.ac.uk', 'Cathy2', 'Carter2', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student2@city.ac.uk', 'Debbie2', 'Dalton2', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student2@qmul.ac.uk', 'Eva2', 'Eastwood2', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student3@ucl.ac.uk', 'Anthony3', 'Abert3', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student3@lse.ac.uk', 'Birk3', 'Barrack3', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student3@king.ac.uk', 'Cathy3', 'Carter3', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student3@city.ac.uk', 'Debbie3', 'Dalton3', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student3@qmul.ac.uk', 'Eva3', 'Eastwood3', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student4@ucl.ac.uk', 'Anthony4', 'Abert4', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student4@lse.ac.uk', 'Birk4', 'Barrack4', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student4@king.ac.uk', 'Cathy4', 'Carter4', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student4@city.ac.uk', 'Debbie4', 'Dalton4', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student4@qmul.ac.uk', 'Eva4', 'Eastwood4', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student5@ucl.ac.uk', 'Anthony5', 'Abert5', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student5@lse.ac.uk', 'Birk5', 'Barrack5', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student5@king.ac.uk', 'Cathy5', 'Carter5', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student5@city.ac.uk', 'Debbie5', 'Dalton5', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'student5@qmul.ac.uk', 'Eva5', 'Eastwood5', NULL, '$2y$10$pbFvfad.1F4WWutcoqecOO2TzM.SEy/5gFDihfJwigVZiOMPrcS7K', '0', CURRENT_TIMESTAMP);

INSERT INTO admin_student (student_id, admin_id) VALUES ('6', '1');
INSERT INTO admin_student (student_id, admin_id) VALUES ('7', '2');
INSERT INTO admin_student (student_id, admin_id) VALUES ('8', '3');
INSERT INTO admin_student (student_id, admin_id) VALUES ('9', '4');
INSERT INTO admin_student (student_id, admin_id) VALUES ('10', '5');
INSERT INTO admin_student (student_id, admin_id) VALUES ('11', '1');
INSERT INTO admin_student (student_id, admin_id) VALUES ('12', '2');
INSERT INTO admin_student (student_id, admin_id) VALUES ('13', '3');
INSERT INTO admin_student (student_id, admin_id) VALUES ('14', '4');
INSERT INTO admin_student (student_id, admin_id) VALUES ('15', '5');
INSERT INTO admin_student (student_id, admin_id) VALUES ('16', '1');
INSERT INTO admin_student (student_id, admin_id) VALUES ('17', '2');
INSERT INTO admin_student (student_id, admin_id) VALUES ('18', '3');
INSERT INTO admin_student (student_id, admin_id) VALUES ('19', '4');
INSERT INTO admin_student (student_id, admin_id) VALUES ('20', '5');
INSERT INTO admin_student (student_id, admin_id) VALUES ('21', '1');
INSERT INTO admin_student (student_id, admin_id) VALUES ('22', '2');
INSERT INTO admin_student (student_id, admin_id) VALUES ('23', '3');
INSERT INTO admin_student (student_id, admin_id) VALUES ('24', '4');
INSERT INTO admin_student (student_id, admin_id) VALUES ('25', '5');
INSERT INTO admin_student (student_id, admin_id) VALUES ('26', '1');
INSERT INTO admin_student (student_id, admin_id) VALUES ('27', '2');
INSERT INTO admin_student (student_id, admin_id) VALUES ('28', '3');
INSERT INTO admin_student (student_id, admin_id) VALUES ('29', '4');
INSERT INTO admin_student (student_id, admin_id) VALUES ('30', '5');

INSERT INTO student_parent (student_id, parent_id) VALUES ('6', '1');
INSERT INTO student_parent (student_id, parent_id) VALUES ('7', '2');
INSERT INTO student_parent (student_id, parent_id) VALUES ('8', '3');
INSERT INTO student_parent (student_id, parent_id) VALUES ('9', '4');
INSERT INTO student_parent (student_id, parent_id) VALUES ('10', '5');
INSERT INTO student_parent (student_id, parent_id) VALUES ('11', '1');
INSERT INTO student_parent (student_id, parent_id) VALUES ('12', '2');
INSERT INTO student_parent (student_id, parent_id) VALUES ('13', '3');
INSERT INTO student_parent (student_id, parent_id) VALUES ('14', '4');
INSERT INTO student_parent (student_id, parent_id) VALUES ('15', '5');
INSERT INTO student_parent (student_id, parent_id) VALUES ('16', '1');
INSERT INTO student_parent (student_id, parent_id) VALUES ('17', '2');
INSERT INTO student_parent (student_id, parent_id) VALUES ('18', '3');
INSERT INTO student_parent (student_id, parent_id) VALUES ('19', '4');
INSERT INTO student_parent (student_id, parent_id) VALUES ('20', '5');
INSERT INTO student_parent (student_id, parent_id) VALUES ('21', '1');
INSERT INTO student_parent (student_id, parent_id) VALUES ('22', '2');
INSERT INTO student_parent (student_id, parent_id) VALUES ('23', '3');
INSERT INTO student_parent (student_id, parent_id) VALUES ('24', '4');
INSERT INTO student_parent (student_id, parent_id) VALUES ('25', '5');
INSERT INTO student_parent (student_id, parent_id) VALUES ('26', '1');
INSERT INTO student_parent (student_id, parent_id) VALUES ('27', '2');
INSERT INTO student_parent (student_id, parent_id) VALUES ('28', '3');
INSERT INTO student_parent (student_id, parent_id) VALUES ('29', '4');
INSERT INTO student_parent (student_id, parent_id) VALUES ('30', '5');

INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Beef burger with chips', 'This is a description of Burger.', '3.59', CURRENT_TIMESTAMP, '../img/burger.jpeg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Koleno', 'This is a description of Koleno.', '2.69', CURRENT_TIMESTAMP, '../img/koleno.jpeg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Lamb', 'This is a description of Lamb.', '2.55', CURRENT_TIMESTAMP, '../img/lamb.jpeg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Fruit Snack (80g)', 'This is a description of Fruit Snack.', '1.89', CURRENT_TIMESTAMP, '../img/fruit.jpg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Red Velvet Cake', 'This is a description of Red Velvet Cake.', '2.29', CURRENT_TIMESTAMP, '../img/rvCake.jpeg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Strawberry cake', 'This is a description of Strawberry cake.', '2.05', CURRENT_TIMESTAMP, '../img/cake.jpeg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Water (100ml)', 'This is a description of Water (100ml).', '0.75', CURRENT_TIMESTAMP, '../img/water.jpg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Innocent Apple juice (100ml)', 'This is a description of Innocent Apple juice (100ml).', '1.25', CURRENT_TIMESTAMP, '../img/AppleJuice.jpeg');
INSERT INTO `item` (`item_id`, `item_name`, `item_description`, `item_price`, `last_update`, `item_image`) VALUES (NULL, 'Coke (330ml)', 'This is a description of Coke.', '1.25', CURRENT_TIMESTAMP, '../img/coke.jpg');

INSERT INTO display_menu (display_id, item_id) VALUES ('1', '1');
INSERT INTO display_menu (display_id, item_id) VALUES ('2', '2');
INSERT INTO display_menu (display_id, item_id) VALUES ('3', '3');
INSERT INTO display_menu (display_id, item_id) VALUES ('4', '4');
INSERT INTO display_menu (display_id, item_id) VALUES ('5', '5');
INSERT INTO display_menu (display_id, item_id) VALUES ('6', '6');
INSERT INTO display_menu (display_id, item_id) VALUES ('7', '7');
INSERT INTO display_menu (display_id, item_id) VALUES ('8', '8');
INSERT INTO display_menu (display_id, item_id) VALUES ('9', '9');

