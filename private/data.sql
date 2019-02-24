SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

USE dinnersdirect;
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'UCL', 'Gower St, Bloomsbury, London WC1E 6BT', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'LSE', 'Houghton St, London WC2A 2AE', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'King', 'Strand, London WC2R 2LS', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'City', 'Northampton Square, Clerkenwell, London EC1V 0HB', CURRENT_TIMESTAMP), (NULL, 'QMUL', 'Mile End Rd, Bethnal Green, London E1 4NS', CURRENT_TIMESTAMP);

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