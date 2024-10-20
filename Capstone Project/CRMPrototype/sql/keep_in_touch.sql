CREATE EXTENSION IF NOT EXISTS pgcrypto;

    DROP TABLE IF EXISTS Events;

    DROP SEQUENCE IF EXISTS email_id_seq CASCADE;
    CREATE SEQUENCE keep_in_touch_id_seq START 1;

    CREATE TABLE Events
    (
        events_id INT PRIMARY KEY DEFAULT nextval('keep_in_touch_id_seq'),
        events VARCHAR(128),
        event_date TIMESTAMP,
        event_status BOOLEAN
    );      

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue", href="monthly_enewsletter.php">Monthly e-newsletter</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="main_client_birthday.php">Main Client Birthday</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="spouse_or_partner_birthday.php">Spouse Birthday</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="move_in_anniversary.php">Move In Anniversary</a>', '2022-03-01 07:52:12',
        't'
    );

    /*
    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="annual_keep_in_touch.php">Annual Keep In Touch</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="semi_annual.php">Semi Annual Keep In Touch</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="quarterly.php">Quarterly Keep In Touch</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="monthly_keep_in_touch.php">Monthly Keep In Touch</a>', '2022-03-01 07:52:12',
        't'
    );

    INSERT INTO Events (events, event_date, event_status) VALUES (
        '<a style = "color: blue" href="bi_weekly.php">Bi Weekly Keep In Touch</a>', '2022-03-01 07:52:12',
        't'
    );
    */
    
    

SELECT * FROM Events;