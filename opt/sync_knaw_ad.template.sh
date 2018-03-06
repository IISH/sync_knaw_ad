#!/bin/bash

#
SETT_LOGIN="DOMAIN\LOGINNAME"
SETT_PW=PASSWORD
SETT_SERVER=IPADDRESS
SETT_PORT=PORT
SETT_OUTPUTDIR=/opt/sync_knaw_ad

#
mkdir -p $SETT_OUTPUTDIR

#
ldapsearch -D $SETT_LOGIN -w $SETT_PW -H ldaps://$SETT_SERVER:$SETT_PORT -b "OU=Users,OU=IISG,OU=Institutes,DC=ia,DC=knaw,DC=local" -LLL -s sub "(objectclass=*)" > $SETT_OUTPUTDIR/iisg.txt
ldapsearch -D $SETT_LOGIN -w $SETT_PW -H ldaps://$SETT_SERVER:$SETT_PORT -b "OU=Users,OU=HuC,OU=Institutes,DC=ia,DC=knaw,DC=local" -LLL -s sub "(objectclass=*)" > $SETT_OUTPUTDIR/huc.txt
ldapsearch -D $SETT_LOGIN -w $SETT_PW -H ldaps://$SETT_SERVER:$SETT_PORT -b "OU=Users,OU=Huygens,OU=Institutes,DC=ia,DC=knaw,DC=local" -LLL -s sub "(objectclass=*)" > $SETT_OUTPUTDIR/huygens.txt
ldapsearch -D $SETT_LOGIN -w $SETT_PW -H ldaps://$SETT_SERVER:$SETT_PORT -b "OU=Users,OU=Meertens,OU=Institutes,DC=ia,DC=knaw,DC=local" -LLL -s sub "(objectclass=*)" > $SETT_OUTPUTDIR/meertens.txt
ldapsearch -D $SETT_LOGIN -w $SETT_PW -H ldaps://$SETT_SERVER:$SETT_PORT -b "OU=Users,OU=Bureau,OU=Institutes,DC=ia,DC=knaw,DC=local" -LLL -s sub "(objectclass=*)" > $SETT_OUTPUTDIR/bureau.txt
ldapsearch -D $SETT_LOGIN -w $SETT_PW -H ldaps://$SETT_SERVER:$SETT_PORT -b "OU=Users,OU=NIAS,OU=Institutes,DC=ia,DC=knaw,DC=local" -LLL -s sub "(objectclass=*)" > $SETT_OUTPUTDIR/nias.txt

#
ls -alh $SETT_OUTPUTDIR

# run php import script
/usr/bin/php /var/www/sync_knaw_ad/htdocs/import.php cron_key=CRONKEY
