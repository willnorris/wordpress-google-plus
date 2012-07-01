# Google+ Tools for WordPress #

This plugin provides very basic tools for working with Google+ such as the +1
button and rel="author" links.  Yes, there are a number of other good plugins
out there for adding the +1 button to your site.  This one is extremely
minimal, with no extra frills.


## Configuration ##

The plugin provides no UI for configuring it.  Instead, you must define a PHP
constant named `GOOGLE_PLUS_ID`.  This is most easily done by adding a
snippet like the following to your wp-config.php file:

    define('GOOGLE_PLUS_ID', 'XXXXXXXXXXXXXXXXXXXXX');


## Questions ##

**How do I add a +1 button to my posts?**

You can use the `[plusone]` shortcode, or manually call the `plusone_button`
function from within your theme.
