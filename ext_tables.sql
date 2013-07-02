#
# Table structure for table 'tt_news'
#
CREATE TABLE tx_upgradereport_domain_model_issue (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	inspection varchar(255) DEFAULT '' NOT NULL,
	issue_identifier varchar(255) DEFAULT '' NOT NULL,
	extension varchar(255) DEFAULT '' NOT NULL,
	location text,
	additional_information text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);