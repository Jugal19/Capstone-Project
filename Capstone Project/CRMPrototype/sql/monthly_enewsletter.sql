CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS monthly_enewsletter_id_seq CASCADE;
CREATE SEQUENCE monthly_enewsletter_id_seq START 1;

DROP TABLE IF EXISTS monthly_enewsletter;


CREATE TABLE monthly_enewsletter
(
	monthly_enewsleter_id INT PRIMARY KEY DEFAULT nextval('monthly_enewsletter_id_seq'),
    --user_id INT NOT NULL,
    --contact_id INT NOT NULL,
	client_first_name VARCHAR(100) NOT NULL,
	client_last_name VARCHAR(100) NOT NULL,
    reminder_date TIMESTAMP NOT NULL,
    subject_line VARCHAR(255) NOT NULL,
    body VARCHAR(10000)
);
SELECT * FROM monthly_enewsletter;