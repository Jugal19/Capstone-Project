CREATE EXTENSION IF NOT EXISTS pgcrypto;

    DROP TABLE IF EXISTS Showings;

    CREATE TABLE Showings
    (
        id INT PRIMARY KEY DEFAULT nextval('user_id_seq'),
        first_name VARCHAR(128),
        last_name VARCHAR(128),
        showing_date TIMESTAMP,
        property_address VARCHAR(128),
        showing_time TIME,
        note VARCHAR(1000)
        
    );      
    
    INSERT INTO Showings(first_name, last_name, showing_date, property_address, showing_time, note) VALUES(
        'Alpesh', 'Patel', '2021-06-19 10:25:11','21 Haskell Avenue', '10:25:11', 'house appointment'
    );

    SELECT * FROM Showings;