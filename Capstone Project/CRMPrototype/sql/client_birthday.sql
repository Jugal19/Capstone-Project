CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS client_birthday_id_seq CASCADE;
CREATE SEQUENCE client_birthday_id_seq START 1;

DROP TABLE IF EXISTS client_birthday;


CREATE TABLE client_birthday
(
	client_birthday_id INT PRIMARY KEY DEFAULT nextval('client_birthday_id_seq'),
    --user_id INT NOT NULL,
    --contact_id INT NOT NULL,
	client_first_name VARCHAR(100) NOT NULL,
	client_last_name VARCHAR(100) NOT NULL,
    reminder_date TIMESTAMP NOT NULL,
    subject_line VARCHAR(255) NOT NULL,
    body VARCHAR(10000)
    


	--email_address VARCHAR(255) UNIQUE,
	--password VARCHAR(128),
	--first_name VARCHAR(128),
	--last_name VARCHAR(128),
	--last_access TIMESTAMP,
	--enrol_date TIMESTAMP,
	--enabled BOOLEAN,
	--Type VARCHAR(2)
);
SELECT * FROM client_birthday;