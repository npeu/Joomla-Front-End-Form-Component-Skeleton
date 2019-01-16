Joomla Front-end Form Component Skeleton
========================================

A starting point for a Joomla front-end CRUD component.

Presents a front-end user with usual CRUD views, e.g. Table of ALL items and a form to add/edit individual items.
Provides the back-end stuff too.

Database
--------

**Important** - this is only a skeleton so you'll need to do some work on your database schema and models to reflect what you actually need.
However, this extension is meant to work out of the box so you can see it working and get you up and running as quickly as possible.
Because of this, the extension will install without anby errors, but you'll need to be confident changing the database after-installation, so I recommend figuring that out first.
This also means changing the front- and back-end forms and table views etc.


PHP-CLI
-------

You'll need PHP-CLI installed to run the build script.


Windows
-------

Currently, there's a .bat file to allow you enter the arguments for the build script.
If you're not using windows you can use the PHP-CLI directly by replacing the placeholders in  this command:
`php -f _build-new/index.php name=%Nm% description=%Ds%`


Don't need a front-end form?
----------------------------

Make the following changes:


Router
======

If you don't need routes at all, you can delete this file. Remember to remove it from teh manifest.

If you do need routing, just not front-end editing, then delete the 'edit' route block which begins:

`if ($segments[0] == 'edit') {`


Views
=====

Again, if you're not using routes, you probablty only need one view, so delete the 'Record' view.
Otherwise, just delete `$form = $this->get('Form');` and anything that refers to `$form` from the 
views and delete the 'fprm' template: "site/views/record/tmpl/form.php"

Models
======

You can also delete "site/models/forms/record.xml".

Controllers
===========

Similarly, you can delete "site/controllers" directory.
