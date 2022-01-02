CREATE TABLE `product`
(
    `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `category`    VARCHAR(255) NOT NULL,
    `name`        VARCHAR(255) NOT NULL,
    `description` TEXT         NOT NULL,
    `price`       DECIMAL      NOT NULL,
    `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `image`       VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);