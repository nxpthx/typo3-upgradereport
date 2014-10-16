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

	EXTENSION "DAM_FALMIGRATION":
	-------------------------------------------------------------------------------
	  dammigration:connectdamrecordswithsysfile goes through all DAM files and
	                                           checks if they have a counterpart in
	                                           the sys_file
	  dammigration:migratedammetadata          migrates DAM metadata to FAL
	                                           metadata
	  dammigration:migratemediatagsinrte       Migrates the <media DAM_UID target
	                                           title>Linktext</media> to <link
	                                           file:29643 -
	                                           download>Linktext</link>
	  dammigration:migratedamcategories        Migrate DAM categories to FAL
	                                           categories
	  dammigration:migratedamcategoriestofalcollections migrate all DAM categories to
	                                           sys_file_collection records,
	  dammigration:migratedamfrontendplugins   migrate all damfrontend_pi1 plugins
	                                           to tt_content.uploads with
	                                           file_collection
	  dammigration:cleanupduplicatefalcollectionreferences checks if there are multiple entries
	                                           in sys_file_reference that contain
	  dammigration:updatereferenceindex        updates the reference index
	  dammigration:migraterelations            migrate relations to dam records
	                                           that dam_ttcontent


.. note::
	Some commands accept parameters. See '/usr/bin/php typo3/cli_dispatch.phpsh extbase help <command identifier>' for more information about a specific command.

.. only:: html

	.. contents:: Available Migration Tasks
		:local:
		:depth: 1
		:backlinks: top

Step 1: Converting DAM to FAL records
=====================================

This task goes through all DAM records and checks if they have a counterpart in the sys_file
table. If not, fetch the file (via the storage, which indexes the file directly)
and update the DAM DB table. Please note that this does not migrate the metadata.
This command can be run multiple times.
A sys_file record that was migrated from tx_dam holds the uid of the original tx_dam record uid in the _migrateddamuid field.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:connectdamrecordswithsysfile

Step 2: Migrate metadata
========================

This task migrates DAM metadata to FAL metadata. It searches for all sys_file
records with a value in the _migrateddamuid field but without a title.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:migratedammetadata

Step 3: Migrate RTE media tags
==============================

This task migrates the <media DAM_UID target title>Linktext</media> to
<link file:29643 - download>My link to a file</link>

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:migratemediatagsinrte

Step 4: Migrate DAM categories to FAL categories
================================================

This task migrates the tx_dam_cat records to sys_category records.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:migratedamcategories

Step 5: Migrate categories to collections
=========================================

This task migrates all DAM categories to sys_file_collection records,
while also migrating the references if they don't exist yet as a pre-requisite,
there needs to be sys_file records that have been migrated from DAM.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:migratedamcategoriestofalcollections

Step 6: Migrate EXT: dam_frontend
=================================

This task migrates all damfrontend_pi1 plugins to tt_content.uploads with file_collection.
Usually used in conjunction with / after migrateDamCategoriesToFalCollectionsCommand().

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:migratedamfrontendplugins

Step 7: Remove duplicate collection references
==============================================

.. note::
	This command is usually *NOT* necessary, only if something went wrong.

This task checks if there are multiple entries in sys_file_reference that contain
the same uid_local and uid_foreign with sys_file_collection references
and removes the duplicates.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:cleanupduplicatefalcollectionreferences

Step 8: Migrate content relations
=================================

This task migrates relations to dam records that dam_ttcontent and dam_uploads introduced.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:migraterelations

Step 9: Update the reference index
==================================

This task updates the reference index.

.. code-block:: bash

	php typo3/cli_dispatch.phpsh extbase dammigration:updatereferenceindex