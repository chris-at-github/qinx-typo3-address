#
# Table structure for table 'tt_address'
#
CREATE TABLE tt_address (

	name varchar(255) DEFAULT '' NOT NULL,
	latitude double(11,2) DEFAULT '0.00' NOT NULL,
	longitude double(11,2) DEFAULT '0.00' NOT NULL,

	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

);
