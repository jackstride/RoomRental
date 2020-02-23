
-- Insert into landlords, autoincrement the ID
INSERT INTO furniture.landlords
    (first_name,last_name,address,phone_number,email_address)
VALUES('John', 'Smith', 'Test Lane, Northampton', 01604999999, 'johnsmith@outlook.com');

INSERT INTO furniture.landlords
    (first_name,last_name,address,phone_number,email_address)
VALUES('Julie', 'Smith', 'Test Lane, Northampton', 01604999999, 'juliesmith@outlook.com');

INSERT INTO furniture.landlords
    (first_name,last_name,address,phone_number,email_address)
VALUES('Peter', 'Stride', 'Test Lane, Northampton', 01604999999, 'peterstride@outlook.com');

INSERT INTO furniture.landlords
    (first_name,last_name,address,phone_number,email_address)
VALUES('Fred', 'Gallagher', 'Test Lane, Northampton', 01604999999, 'fredgallagher@outlook.com');

INSERT INTO furniture.landlords
    (first_name,last_name,address,phone_number,email_address)
VALUES('Dom', 'Dolly', 'Test Lane, Northampton', 01604999999, 'domdolly@outlook.com');

-- Insert houses

INSERT INTO furniture.houses
    (landlord_id,address,number_of_floors,number_of_rooms,wifi_available)
VALUES
    (1, 'Bridge Street, Kettering', 2, 4, 1);

INSERT INTO furniture.houses
    (landlord_id,address,number_of_floors,number_of_rooms,wifi_available)
VALUES
    (2, 'Bridge Street, Kettering', 1, 2, 1);

INSERT INTO furniture.houses
    (landlord_id,address,number_of_floors,number_of_rooms,wifi_available)
VALUES
    (3, 'Bridge Street, Kettering', 3, 6, 0);

INSERT INTO furniture.houses
    (landlord_id,address,number_of_floors,number_of_rooms,wifi_available)
VALUES
    (4, 'Bridge Street, Kettering', 4, 6, 1);

INSERT INTO furniture.houses
    (landlord_id,address,number_of_floors,number_of_rooms,wifi_available)
VALUES
    (5, 'Bridge Street, Kettering', 2, 5, 0);



-- Insert rooms

INSERT INTO furniture.rooms
    (house_id, room_type, monthly_rental_figure, deposit_figure, description, is_furnished, is_ensuite, is_occupied)
VALUES
    (1, 'Double', 500, 200, 'Great Room', 1, 0, 0);

INSERT INTO furniture.rooms
    (house_id,room_type,monthly_rental_figure,deposit_figure,description,is_furnished,is_ensuite,is_occupied)
VALUES
    (2, "Single", 550, 250, 'Great Room', 1, 1, 1);

INSERT INTO furniture.rooms
    (house_id,room_type,monthly_rental_figure,deposit_figure,description,is_furnished,is_ensuite,is_occupied)
VALUES
    (3, 'Double', 500, 200, 'Great Room', 0, 1, 0);

INSERT INTO furniture.rooms
    (house_id,room_type,monthly_rental_figure,deposit_figure,description,is_furnished,is_ensuite,is_occupied)
VALUES
    (4, 'Double', 400, 100, 'Great Room', 1, 0, 1);

INSERT INTO furniture.rooms
    (house_id,room_type,monthly_rental_figure,deposit_figure,description,is_furnished,is_ensuite,is_occupied)
VALUES
    (5, 'Single', 575, 275, 'Great Room', 0, 0, 0);



-- Insert Tenants

INSERT INTO furniture.tenants
    (title,first_name,last_name,mobile_phone_number,email_address,employer_details,is_renting)
VALUES
    ('Mr', 'Fred', 'Flinstone', 01604899999, 'fredflinstone@outlook.com', 'Mcdonalds', 1);

INSERT INTO furniture.tenants
    (title,first_name,last_name,mobile_phone_number,email_address,employer_details,is_renting)
VALUES
    ('Mrs', 'Velma', 'Doo', 01604899999, 'velmadoo@outlook.com', 'Mcdonalds', 0);

INSERT INTO furniture.tenants
    (title,first_name,last_name,mobile_phone_number,email_address,employer_details,is_renting)
VALUES
    ('DR', 'Shaggy', 'doo', 01604899999, 'shaggydoo@outlook.com', 'Mcdonalds', 0);

INSERT INTO furniture.tenants
    (title,first_name,last_name,mobile_phone_number,email_address,employer_details,is_renting)
VALUES
    ('Ms', 'ScoobyDee', 'Doo', 01604899999, 'scoobydeedoo@outlook.com', 'ScobbySnack Inc', 1);

INSERT INTO furniture.tenants
    (title,first_name,last_name,mobile_phone_number,email_address,employer_details,is_renting)
VALUES
    ('Miss', 'Lola', 'bunny', 01604899999, 'lolabunny@outlook.com', 'Mcdonalds', 1);


-- Insert Rentals


INSERT INTO furniture.rentals
    (tenant_id, room_id, occupancy_start_date, occupancy_end_date)
VALUES
    (1, 1, '2020-01-10', '2020-02-10');

INSERT INTO furniture.rentals
    (tenant_id, room_id, occupancy_start_date, occupancy_end_date)
VALUES
    (4, 2, '2020-01-10', '2020-02-10');

INSERT INTO furniture.rentals
    (tenant_id, room_id, occupancy_start_date, occupancy_end_date)
VALUES
    (5, 3, '2020-01-10', '2020-02-10');