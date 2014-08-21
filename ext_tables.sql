#
# Table structure for table 'tx_smoothmigration_domain_model_issue'
#
CREATE TABLE tx_smoothmigration_domain_model_issue (
	uid int(11) unsigned NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	inspection varchar(255) DEFAULT '' NOT NULL,
	identifier varchar(255) DEFAULT '' NOT NULL,
	extension varchar(255) DEFAULT '' NOT NULL,
	location_info text,
	additional_info text,
	migration_status int(1) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_smoothmigration_domain_model_deprecation'
#
CREATE TABLE tx_smoothmigration_domain_model_deprecation (
	uid int(11) unsigned NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	file mediumtext,
	class varchar(255) DEFAULT '',
	interface varchar(255) DEFAULT '',
	method varchar(255) DEFAULT '',
	message mediumtext,
	is_static int(1) unsigned DEFAULT '0' NOT NULL,
	visibility varchar(10) DEFAULT '',
	deprecated_since_version varchar(10) DEFAULT '',
	removed_in_version varchar(10) DEFAULT '',
	replacement_class varchar(255) DEFAULT '',
	replacement_interface varchar(255) DEFAULT '',
	replacement_method varchar(255) DEFAULT '',
	regex_search varchar(255) DEFAULT '',
	regex_replace varchar(255) DEFAULT '',
	no_brainer int(1) unsigned DEFAULT '0' NOT NULL,
	replacement_message mediumtext,
	PRIMARY KEY (uid),
	KEY parent (pid)
);
