SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO category (category_name) VALUES ('charger');
INSERT INTO category (category_name) VALUES ('case');
INSERT INTO category (category_name) VALUES ('headset');
INSERT INTO device (device_name) VALUES ('iPhone 5');
INSERT INTO device (device_name) VALUES ('Samsung Galaxy S4');
INSERT INTO device (device_name) VALUES ('Google Nexus 5');
INSERT INTO device (device_name) VALUES ('HTC One');

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    2,
    'Genuine Samsung Galaxy S4 S-View Premium Cover Case - Black',
    'Ideal for checking the time or screening and answering incoming calls without opening the case. The official Samsung S-View Cover for the Samsung Galaxy S4 is slim and stylish.',
    'samsunggalaxys4case.jpg',
    '32.99',
    '119'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    2,
    'Ultra-thin Protective Case for iPhone 5S / 5 - Black',
    'Keep your iPhone 5S / 5 protected from scratches and cosmetic damage with this extremely thin and fantastically lightweight case.',
    'iphone5case.jpg',
    '9.95',
    '23'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    1,
    'Genuine Apple Lightning Mains Charger - White',
    'With the Mains Charger, you can keep your iPhone 5 battery topped up at home in white.',
    'iphone5charger.jpg',
    '29.95',
    '66'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    3,
    'SoundWear SD10 Bluetooth Stereo Headset',
    'The SD10 SoundWear Bluetooth Stereo Headset combines stylish design and modern technology designed for an active lifestyle.',
    'soundwearheadset.jpg',
    '19.99',
    '12'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    2,
    'FlexiShield Case for HTC One - Purple',
    'Custom moulded for the HTC One, this purple Flexishield case provides slim fitting and durable protection against damage.',
    'htconecase.jpg',
    '5.99',
    '65'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    2,
    'FlexiShield Case for Google Nexus 5 - Clear',
    'Crystal case like protection with the durability of a silicone case for the Google Nexus 5 in clear.',
    'googlenexus5case.jpg',
    '5.99',
    '38'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    3,
    'Panasonic HXD3 Headphones - White',
    'Experience outstanding audio quality like never before with the immersive Panasonic HXD3 headphones in white.',
    'panasonicheadset.jpg',
    '19.99',
    '12'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    1,
    'Samsung Galaxy S4 In Car Charger',
    'Make sure that your Samsung Galaxy phone is always fully charged during car journeys with this in car charger.',
    'samsunggalaxys4charger.jpg',
    '14.95',
    '72'
    );

INSERT INTO product (
    product_category_id,
    product_name,
    product_description,
    product_image,
    product_price,
    product_quantity
    )
VALUES (
    2,
    'Armourdillo Hybrid Protective Case for Google Nexus 5 - Black',
    'Protect your Nexus 5 with this black ArmourDillo Case, comprised of an inner TPU case and an outer impact resistant exoskeleton.',
    'googlenexus5case2.jpg',
    '12.99',
    '3'
    );


INSERT INTO user (
    user_name,
    user_hash,
    user_salt,
    user_email,
    user_type
    )
VALUES (
    'root',
    'be46e8c0974dc0bd5293f98bd9434255cc48353be13466ee6014c6a9810ca882',
    'zfQMEzdpm7HXsk8yx7l87w==',
    'root@local.com',
    'Administrator'
    );

INSERT INTO user (
    user_name,
    user_hash,
    user_salt,
    user_email,
    user_type
    )
VALUES (
    'Sheraz',
    'bee04bd0df081ad890777cbb1adf3d2cb883f0b4f3fcfdd44cf1cceb4c6cb3ba',
    'dWvdKXeKAwFBMSKY6PosMw==',
    'sheraz@madeupdomain.com',
    'Standard'
    );

INSERT INTO compat (compat_product_id, compat_device_id) VALUES (1, 2);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (2, 1);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (3, 1);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (4, 1);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (4, 2);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (4, 3);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (4, 4);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (5, 4);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (6, 3);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (7, 2);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (7, 3);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (8, 2);
INSERT INTO compat (compat_product_id, compat_device_id) VALUES (9, 3);

SET FOREIGN_KEY_CHECKS = 1;