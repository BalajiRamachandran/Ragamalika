=== Bulk Password Reset ===
Contributors: Ruben Woudsma
Tags: users, reset, password, admin, bulk mode, password reset
Requires at least: 2.8
Tested up to: 3.2
Stable tag: trunk

Bulk Password Reset is a tool which can help you do a bulk password reset 
on all the users or just specific users within a category.

== Description ==

Bulk password reset is an easy plugin that can help you reset all the 
password of the users or the users in a specific category. Optionally 
you can add a e-mail note and set the default password.

Important Links:

* <a href="http://rubenwoudsma.nl" title="Author page">Website of the author</a>

= Features =

* Users              : Bulk reset the password of users.
* E-mail             : An e-mail can be sent to all the users to reset the password.
* Additional message : Add an additional message to the e-mail message.
* Several options    : Options to sent e-mail or change password nag

== Credits ==

Copyright 2011 by Ruben Woudsma. The plugin is based on the template 
plugin template and furthermore several functions have been copied 
from yoast.com his Google Analytics plugin. I would like to thank 
both Joost van de Valk (yoast.com) and Pressography.com for a look 
into their code.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

== Installation ==

1. 	Upload the files to wp-content/plugins/bulk_password_reset

2. 	Activate the plugin

3.	Navigate to Users --> Bulk password reset

4. 	Select the users or categories and reset the password.

That's it ... Have fun

== Screenshots ==

1. Screenshot Admin Area 

== Frequently Asked Questions ==

* None yet. More to come.

== Changelog == 

= V1.0 - 14-09-2011 =
* FIX : Fixed an issue about wrong datatype (credits: tosho and proximity2008)
* FIX : Advanced setting with jQuery no longer working (credits: eastwoodarts)
* FIX : Minor update to the Dutch language pack

= V0.9 - 07.12.2009 =
* FIX : Dutch language support
* FIX : Add extra message to outgoing mail
* NEW : Add own authentication mail
* NEW : Add own password
* NEW : Extra option added for changing password nag
* FIX : Update translation .pot file

= V0.7 - 02.12.2009 =
* CHANGE : Rewrote function into php class
* CHANGE : Renamed plugin from 'bulk_reset_password' to 'bulk_password_reset'
* NEW : Added css for success message
* NEW : Language support included
* FIX : Some small code changes

= V0.5 - 28.11.2009 =
* NEW : Admin page
* NEW : Role group selection
* NEW : Advanced settings
* NEW : Reset password
* NEW : Send activation mail
* NEW : Add additional message