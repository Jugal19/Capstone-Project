CREATE EXTENSION IF NOT EXISTS pgcrypto;

    DROP TABLE IF EXISTS Contacts;

    CREATE TABLE Contacts
    (
        id INT PRIMARY KEY DEFAULT nextval('contact_id_seq'), 
        first_name VARCHAR(128),
        last_name VARCHAR(128),
        email_address VARCHAR(255),
        occupation VARCHAR(30),
        job_title VARCHAR(128),
        source_of_contact VARCHAR(128),
        --phone_num VARCHAR(255),
        business_phone VARCHAR(14),
        home_phone VARCHAR(14),
        mobile_phone VARCHAR (14),
        fax_num VARCHAR(14),
        street_num VARCHAR (6),
        street VARCHAR(100),
        city VARCHAR(100),
        province VARCHAR(100),
        zip_code VARCHAR(14),
        notes VARCHAR(1000)
    );

     INSERT INTO Contacts (first_name, last_name, email_address, 
                             occupation, job_title, source_of_contact, business_phone, 
                             home_phone, mobile_phone, fax_num, street_num,street, city, province, zip_code, notes) VALUES (
        'Bruce', 'Wayne', 'brucewayne@batman.com', 'Wayne Enterprise', 'Owner', 'Friend', '9054358814', 
        '123456789', '12345678910', '(643)-324-155', '21','Mountain Drive', 'Gotham', 'New Jersey', 
        'G1C4P7D', 'Left him a message' 
    );   

    SELECT * FROM contacts;  