.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.  Check: ÄÖÜäöüß

.. include:: ../Includes.txt

.. _installation:

============
Installation
============

The installation process is pretty straightforward.
Download and install the extension via TYPO3's extension manager.

You can get the latest source from https://github.com/nxpthx/typo3-upgradereport.git and clone it directly into typo3temp/ext:

.. code-block:: bash

	cd typo3temp/ext/
	git clone https://github.com/nxpthx/typo3-upgradereport.git smoothmigration

Or you can add it to your project as a submodule:

.. code-block:: bash

	git submodule add https://github.com/nxpthx/typo3-upgradereport.git smoothmigration typo3conf/ext/smoothmigration
