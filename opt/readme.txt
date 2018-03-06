1. copy sync_knaw_ad.template.sh to /opt/sync_knaw_ad.sh
   modify the settings

2. make runable
   chmod +x /opt/sync_knaw_ad.sh

3. configure cronjob to run every morning
0 7 * * *   /opt/sync_knaw_ad.sh
