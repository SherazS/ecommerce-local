
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product`
(
    `product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_category_id` TINYINT NOT NULL,
    `product_name` VARCHAR(64) NOT NULL,
    `product_image` VARCHAR(64) NOT NULL,
    `product_description` VARCHAR(64) NOT NULL,
    `product_price` INTEGER NOT NULL,
    `product_quantity` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`),
    INDEX `FI_duct_to_category` (`product_category_id`),
    CONSTRAINT `product_to_category`
        FOREIGN KEY (`product_category_id`)
        REFERENCES `category` (`category_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `category_id` TINYINT NOT NULL AUTO_INCREMENT,
    `category_name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- device
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `device`;

CREATE TABLE `device`
(
    `device_id` TINYINT NOT NULL AUTO_INCREMENT,
    `device_name` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`device_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compat
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compat`;

CREATE TABLE `compat`
(
    `compat_id` INTEGER NOT NULL AUTO_INCREMENT,
    `compat_product_id` INTEGER NOT NULL,
    `compat_device_id` TINYINT NOT NULL,
    PRIMARY KEY (`compat_id`),
    INDEX `FI_duct` (`compat_product_id`),
    INDEX `FI_ice` (`compat_device_id`),
    CONSTRAINT `product`
        FOREIGN KEY (`compat_product_id`)
        REFERENCES `product` (`product_id`),
    CONSTRAINT `device`
        FOREIGN KEY (`compat_device_id`)
        REFERENCES `device` (`device_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `user_id` TINYINT NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(32) NOT NULL,
    `user_hash` VARCHAR(64) NOT NULL,
    `user_salt` VARCHAR(32) NOT NULL,
    `user_email` VARCHAR(64) NOT NULL,
    `user_type` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
