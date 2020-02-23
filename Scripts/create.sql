-- CREATE OR REPLACE TYPE address_type AS OBJECT(
-- street VARCHAR(30),
-- city VARCHAR(30),
-- country VARCHAR(30));
-- /

-- CREATE TABLE addresses OF address_type;

CREATE TABLE furniture.landlords
(
    landlord_id INT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR
(50),
    last_name VARCHAR
(50),
    address VARCHAR
(100),
    phone_number INT
(11),
    email_address VARCHAR
(50)
);

CREATE TABLE furniture.houses
(
    house_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    landlord_id INT
(6),
    address VARCHAR
(100),
    number_of_floors INT,
    number_of_rooms INT,
    wifi_available TINYINT
(1)
);


CREATE TABLE furniture.rooms
(
    room_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    house_id INT
(4),
    room_type VARCHAR
(25),
    monthly_rental_figure DECIMAL
(5,2),
    deposit_figure DECIMAL
(5,2),
    description VARCHAR
(1000),
    is_furnished TINYINT
(1),
    is_ensuite TINYINT
(1),
    is_occupied TINYINT
(1) DEFAULT 0
);


CREATE TABLE furniture.tenants
(
    tenant_id INT(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR
(6),
    first_name VARCHAR
(40),
    last_name VARCHAR
(50),
    mobile_phone_number INT
(11),
    email_address VARCHAR
(50),
    employer_details VARCHAR
(150),
    is_renting TINYINT
(1) DEFAULT 0
);


CREATE TABLE furniture.rentals
(
    rental_id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    tenant_id INT
(7),
    room_id INT
(5) ,
    occupancy_start_date DATE ,
    occupancy_end_date DATE
);













DROP TABLE furniture.rentals;
DROP TABLE furniture.tenants;
DROP TABLE furniture.rooms;
DROP TABLE furniture.houses;
DROP TABLE furniture.landlords;