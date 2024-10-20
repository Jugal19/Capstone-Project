 /*	Name:	Jugal Patel
		Date:	Spetember/9th/2020
		Course Code:	WEBD3201
  */
CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS email_id_seq CASCADE;
CREATE SEQUENCE email_id_seq START 1;

DROP TABLE IF EXISTS emails;


CREATE TABLE emails
(
	id INT PRIMARY KEY DEFAULT nextval('email_id_seq'),
    user_id INT NOT NULL,
    contact_id INT NOT NULL,
    sent_date TIMESTAMP NOT NULL,
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