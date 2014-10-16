.. ==================================================
.. FOR YOUR INFORMATION 
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.  Check: ÄÖÜäöüß

.. include:: ../Includes.txt

.. _installation:

============================
Installation and Preparation
============================

Prerequisites
=============

- You need to be running on at least TYPO3 version 6.0.
- You need to have the *scheduler* extension installed and configured.
- You need a *_cli_lowlevel* backend user. This must be an empty non-admin user.

Install the extension
=====================

The installation process is pretty straightforward.
Download and install the extension via TYPO3's extension manager.

You can get the latest source from https://github.com/b13/t3ext-dam_falmigration and clone it directly into typo3temp/ext:

.. code-block:: bash

	cd typo3temp/ext/
	git clone https://github.com/b13/t3ext-dam_falmigration.git dam_falmigration

Or you can add it to your project as a submodule:

.. code-block:: bash

	git submodule add https://github.com/b13/t3ext-dam_falmigration.git dam_falmigration typo3conf/ext/dam_falmigration


Index your data
===============

Index all your files with a Scheduler Task (File Abstratcion Layer: Update storage index)

To make the migration work, you need to have indexed all data you previously had in DAM with
FAL as well.
In case you have not done this yet, FAL offers a scheduler task to take care of that.

Pick "fileadmin" as your root storage.
