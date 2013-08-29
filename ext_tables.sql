#
# Table structure for table ''
#
CREATE TABLE tx_smoothmigration_domain_model_issue (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	inspection varchar(255) DEFAULT '' NOT NULL,
	identifier varchar(255) DEFAULT '' NOT NULL,
	extension varchar(255) DEFAULT '' NOT NULL,
	location_info text,
	additional_info text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);