SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

USE dinnersdirect;
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'UCL', 'Gower St, Bloomsbury, London WC1E 6BT', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'LSE', 'Houghton St, London WC2A 2AE', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'King', 'Strand, London WC2R 2LS', CURRENT_TIMESTAMP);
INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `last_update`) VALUES (NULL, 'City', 'Northampton Square, Clerkenwell, London EC1V 0HB', CURRENT_TIMESTAMP), (NULL, 'QMUL', 'Mile End Rd, Bethnal Green, London E1 4NS', CURRENT_TIMESTAMP);

INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'aparent123@gmail.com', 'Aparentfn', 'Aparentln', NULL, 'Aparent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'bparent123@gmail.com', 'Bparentfn', 'Bparentln', NULL, 'Bparent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'cparent123@gmail.com', 'Cparentfn', 'Cparentln', NULL, 'Cparent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'dparent123@gmail.com', 'Dparentfn', 'Dparentln', NULL, 'Dparent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `parent` (`parent_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'eparent123@gmail.com', 'Eparentfn', 'Eparentln', NULL, 'Eparent123', '0', CURRENT_TIMESTAMP);

INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'astudent123@ucl.ac.uk', 'Astudentfn', 'Astudentln', NULL, 'Astudent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'bstudent123@ucl.ac.uk', 'Bstudentfn', 'Bstudentln', NULL, 'Bstudent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'cstudent123@ucl.ac.uk', 'Cstudentfn', 'Cstudentln', NULL, 'Cstudent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'dstudent123@ucl.ac.uk', 'Dstudentfn', 'Dstudentln', NULL, 'Dstudent123', '0', CURRENT_TIMESTAMP);
INSERT INTO `student` (`student_id`, `email_address`, `first_name`, `last_name`, `phone_number`, `password`, `status`, `last_update`) VALUES (NULL, 'estudent123@ucl.ac.uk', 'Estudentfn', 'Estudentln', NULL, 'Estudent123', '0', CURRENT_TIMESTAMP);


