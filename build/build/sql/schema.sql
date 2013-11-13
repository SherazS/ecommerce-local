
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- cms_article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_article`;

CREATE TABLE `cms_article`
(
    `art_id` INTEGER NOT NULL AUTO_INCREMENT,
    `art_user_id` INTEGER NOT NULL,
    `art_cat_id` TINYINT NOT NULL,
    `art_title` VARCHAR(64) NOT NULL,
    `art_text` TEXT NOT NULL,
    PRIMARY KEY (`art_id`),
    INDEX `FI_egory2article` (`art_cat_id`),
    INDEX `FI_r2article` (`art_user_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- cms_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_category`;

CREATE TABLE `cms_category`
(
    `cat_id` TINYINT NOT NULL AUTO_INCREMENT,
    `cat_name` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user_main
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_main`;

CREATE TABLE `user_main`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(32) NOT NULL,
    `user_pass` VARCHAR(32) NOT NULL,
    `user_email` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
