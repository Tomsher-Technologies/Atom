ALTER TABLE `divisions` ADD `home_image` VARCHAR(191) NULL DEFAULT NULL AFTER `gallery_image`;
ALTER TABLE `product_categories` ADD `home_image` VARCHAR(191) NULL DEFAULT NULL AFTER `image_2`;


ALTER TABLE `general_settings` ADD `play_store` VARCHAR(255) NULL DEFAULT NULL AFTER `phone`, ADD `app_store` VARCHAR(255) NULL DEFAULT NULL AFTER `play_store`;

ALTER TABLE `products` ADD `ar_image` VARCHAR(250) NULL DEFAULT NULL AFTER `image`;



