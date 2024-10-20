CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS move_in_anniversay_id_seq CASCADE;
CREATE SEQUENCE move_in_anniversary_id_seq START 1;

DROP TABLE IF EXISTS move_in_anniversary;


CREATE TABLE move_in_anniversary
(
	move_in_anniversary_id INT PRIMARY KEY DEFAULT nextval('move_in_anniversary_id_seq'),
    --user_id INT NOT NULL,
    --contact_id INT NOT NULL,
	client_first_name VARCHAR(100) NOT NULL,
	client_last_name VARCHAR(100) NOT NULL,
    reminder_date TIMESTAMP NOT NULL,
    subject_line VARCHAR(255) NOT NULL,
    body VARCHAR(10000)
);
SELECT * FROM move_in_anniversary;