# restart Apache if load is higher than 25
*/5 * * * * /usr/sbin/restart_apache_on_high_load.sh >/dev/null 2>&1

#!/bin/sh
# script to check server for extremely high load and restart Apache if the condition is matched
check=`cat /proc/loadavg | sed 's/./ /' | awk '{print $1}'`
# define max load avarage when script is triggered
max_load='25'
# log file
high_load_log='/var/log/apache_high_load_restart.log';
# location of inidex.php to overwrite with temporary message
index_php_loc='/home/site/www/index.php';
# location to Apache init script
apache_init='/etc/init.d/apache2';
#
site_maintenance_msg="Site Maintenance in progress - We will be back online in a minute";
if [ $check -gt "$max_load" ]; then>
#25 is load average on 5 minutes
cp -rpf $index_php_loc $index_php_loc.bak_ap
echo "$site_maintenance_msg" > $index_php_loc
sleep 15;
if [ $check -gt "$max_load" ]; then
$apache_init stop
sleep 5;
$apache_init restart
echo "$(date) : Apache Restart due to excessive load | $check |" >> $high_load_log;
cp -rpf $index_php_loc.bak_ap $index_php_loc
fi
fi