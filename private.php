<?php

// shows: logged in as:
//Tam for: 1h 02m 44s


//come to this page at feb 8 9:29:00

/* text for the private page (only logged in people see it)

private stuff for logged-in users only
or message with link:
Please login first

if the password is wrongly entered three times in a row
for a given username, lock that user.
e.g. Tam tries three bad passwords in row,
the file can keep that account locked by storing data like this:

Tam,4515,12321,3,1 (booleans are stored as 0 and 1 ): 1 could mean locked

use preg_split() function to separate the csv


Joe, abc, 67898,0,0 (0 incorrect passwords in a row, not locked)
on the 3rd attempted

every page should have links to every other page(don't repeat code:
make a file of constants and require_once('constants')
e.g.

define("LOGIN_URL", "<a href='login.php'>Log in</a>")
