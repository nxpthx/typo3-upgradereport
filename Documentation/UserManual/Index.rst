.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.  Check: ÄÖÜäöüß

.. include:: ../Includes.txt

.. _user-manual:

===========
User Manual
===========

The migration tasks can be long running processes. Therefore they are executed using the command line dispatcher.

You can execute the dispathcer from the root of your website:

.. code-block:: bash

	php typo3/cli_dispatch.phpsh

The available migration tasks can be found under the *extbase* cliKey:

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase help

	The following commands are currently available:

	EXTENSION "SMOOTHMIGRATION":
	-------------------------------------------------------------------------------
	  smoothmigration:check                    Display available checks
	  smoothmigration:checkall                 Run all checks on all- or on a
	                                           single extension
	  smoothmigration:migration                Display available migrations
	  smoothmigration:report                   Display report for all issues or for
	                                           a single extension

.. note::
	Some commands accept parameters. See '/usr/bin/php typo3/cli_dispatch.phpsh extbase help <command identifier>' for more information about a specific command.

To see all available checks and migrations:

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check
	php typo3/cli_dispatch.phpsh extbase smoothmigration:migration

.. only:: html

	.. contents:: Available Checks
		:local:
		:depth: 1
		:backlinks: top

Check for calls to deprecated static methods
============================================

Calling deprecated methods will give an error as they have been removed. From the 4.5 release some view helpers have been deprecated. Changing them to their respective new view helpers would solve the issue.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-core-code-callToDeprecatedStaticMethods [extensionKey]

Check for calls to deprecated viewhelpers
=========================================

From the 4.5 release some view helpers have been deprecated. Changing them to their respective new view helpers would solve the issue.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-core-code-callToDeprecatedViewHelpers [extensionKey]

Check for use of mysql_* functions
==================================

The new TYPO3 LTS version uses namespaced classes. Update the old core classnames to the namespaced versions.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-core-code-mysql [extensionKey]

Check for removed constants
===========================

The constant PATH_t3lib has been removed. The code in the old t3lib directory has been relocated. You may solve most of the issues found by this check by first running the check and migration for 'requireOnceInExtensions'.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-core-code-removedConstants [extensionKey]

Check for require_once // include_once
======================================

While namespacing all the classes have been restructured, relocated and renamed. Including old files therefore will fail. Since TYPO3 CMS 4.3 there is an autoloader which makes manual requiring superfluous: simply use the needed classes.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-core-code-requireOnceInExtensions [extensionKey]

Check for usage of DAM Classes
==============================

Since DAM won't work in 6.x anymore, you should remove all calls to DAM-Methods and Instances of DAM-Classes and change them to use FAL/Media.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-dam-code-callToDamClasses [extensionKey]

Check for datbase UTF-8 readiness
=================================

UTF-8 ensures your database will be able to store multiple languages without any data conversions being done while storing or retrieving the values.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-database-database-utf8

Check for extensions incompatible with current LTS
==================================================

Extensions can specify the TYPO3 versions they are compatible with.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-extension-code-incompatiblewithlts

Check for obsolete extensions
=============================

Extensions can specify in their ext_emconf.php status field if they are obsolete.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:check typo3-extension-code-obsolete

.. only:: html

	.. contents:: Available Migrations
		:local:
		:depth: 1
		:backlinks: top

Migrate calls to deprecated static methods
==========================================

Replace deprecated methods method calls with new ones.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:migration typo3-core-code-callToDeprecatedStaticMethods [extensionKey] [experimental]

Migrate calls to require_once // include_once
=============================================

Try and replace all reported require/include calls. Multiple checks and migrations may be needed.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:migration typo3-core-code-requireOnceInExtensions [extensionKey]

Make database UTF-8 ready
=========================

Fix database, table and collumn character set and collation.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase smoothmigration:migration typo3-database-database-utf8 [extensionKey]
