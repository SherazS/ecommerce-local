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
    1,
    'Genuine Samsung Galaxy S4 S-View Premium Cover Case - Black',
    'Ideal for checking the time or screening and answering incoming calls without opening the case. The official Samsung S-View Cover for the Samsung Galaxy S4 is slim and stylish.',
    'samsunggalaxys4case.png',
    '3299',
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
    1,
    'Ultra-thin Protective Case for iPhone 5S / 5 - Black',
    'Keep your iPhone 5S / 5 protected from scratches and cosmetic damage with this extremely thin and fantastically lightweight case.',
    'iphone5case.png',
    '995',
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
    2,
    'Genuine Apple Lightning Mains Charger - White',
    'With the Mains Charger, you can keep your iPhone 5 battery topped up at home in white.',
    'iphone5charger.png',
    '2995',
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
    'soundwearheadset.png',
    '1999',
    '12'
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

SET FOREIGN_KEY_CHECKS = 1;