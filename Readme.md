wwwquota-nagios
===============
Nagios monitoring of wwwhdd on linux

This plugin was written to monitor statistics from wwwhdd in nagios.
first-release:
        - Quota utilisation

howto:

- Copy the diskx.php somewhere on your www server and chmod 755 diskx.php
- edit crontab as user www-data or low-access user, and add " * /15  *  *  *  *  curl http://192.168.0.10/diskx.php > /tmp/wwwhdd"
- copy the file check_quotahdd to your <nagios>/libexec dir (where all your other scripts for nagios probably reside).
- edit <nagios>/etc/objects/commands.cfg and add the commands specified in the provided commands.cfg
- edit <nagios>/etc/objects/server-file.cfg and add a definition for each user, as illustrated in the provided user.cfg
  -     this may also be scripted with a bash-for loop 

TESTERS WANTED still tested on OpenSuSe 13.2 with Apache mod_php5 and Nagios 4.0.8
