-- Primary Keys

ALTER TABLE furniture.landlords
ADD CONSTRAINT pk_landlords
PRIMARY KEY (landlord_id);

ALTER TABLE furniture.houses
ADD CONSTRAINT pk_houses
PRIMARY KEY (house_id);

ALTER TABLE furniture.rooms
ADD CONSTRAINT pk_rooms
PRIMARY KEY (room_id);

ALTER TABLE furniture.tenants
ADD CONSTRAINT pk_tenants
PRIMARY KEY (tenant_id);

ALTER TABLE furniture.rentals
ADD CONSTRAINT pk_rentals
PRIMARY KEY (rental_id);


-- Foreign Keys

ALTER TABLE furniture.houses 
ADD CONSTRAINT fk_h_landlord
FOREIGN KEY (landlord_id)
REFERENCES landlords(landlord_id);

ALTER TABLE furniture.rooms 
ADD CONSTRAINT fk_r_house_id
FOREIGN KEY (house_id)
REFERENCES houses(house_id);

ALTER TABLE furniture.rentals 
ADD CONSTRAINT fk_re_tenant_id
FOREIGN KEY (tenant_id)
REFERENCES tenants(tenant_id);

ALTER TABLE furniture.rentals 
ADD CONSTRAINT fk_r_room_id
FOREIGN KEY (room_id)
REFERENCES rooms(room_id);




ALTER TABLE furniture.houses
DROP FOREIGN KEY fk_h_landlord;

ALTER TABLE furniture.rooms
DROP FOREIGN KEY fk_r_house_id;

ALTER TABLE furniture.rentals
DROP FOREIGN KEY fk_re_tenant_id;

ALTER TABLE furniture.rentals
DROP FOREIGN KEY fk_r_room_id;


