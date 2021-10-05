# Slack Update - Drupal 9 Module
## This is for the antiochtoastmasters.com d9 site

This is my custom module written to take the specified contact form, and hook the submit
of that form.  Then, once the form is submitted, we will update slack with the specified
slack webhook URL.

The machine name for the Contact Form, as well as the Slack Webhook URL, are both
set in an admin page within drupal, so that these values do not have to be hard-coded
in the code.
