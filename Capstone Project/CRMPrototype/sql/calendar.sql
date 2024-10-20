CREATE EXTENSION IF NOT EXISTS pgcrypto;

    DROP TABLE IF EXISTS Calendar;

    CREATE TABLE Calendar
    (
        id INT PRIMARY KEY DEFAULT nextval('user_id_seq'),
        client_first_name VARCHAR(128),
        client_last_name VARCHAR(128),
        client_email_address VARCHAR(255),
        note VARCHAR(1000),
        reminder_date TIMESTAMP
    );      

    INSERT INTO Calendar(client_first_name, client_last_name, client_email_address, note, reminder_date) VALUES(
        'Alpesh', 'Patel', 'alpeshpatel@hotmail.ca', 'house appointment in Markham', '2021-06-19 10:25:11'
    );

    SELECT * FROM Calendar;