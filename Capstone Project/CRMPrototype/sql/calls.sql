 /*	Name:	Jugal Patel
		Date:	Spetember/9th/2020
		Course Code:	WEBD3201
  */
CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS calls_id_seq CASCADE;
CREATE SEQUENCE calls_id_seq START 1;

DROP TABLE IF EXISTS calls;

CREATE TABLE calls
(
	id INT PRIMARY KEY DEFAULT nextval('calls_id_seq'),
    call_note VARCHAR(1000) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
    business_phone VARCHAR(14),
    home_phone VARCHAR(14),
    mobile_phone VARCHAR (14),
    --fax_num VARCHAR(14),
    call_date DATE NOT NULL,
    call_time TIME NOT NULL
);