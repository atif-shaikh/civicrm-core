Support:
--------

Drupal version : 7.2.x
CiviCRM Version : 4.2 

This plugin is used for Donation section of CiviCRM.

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Installation Steps:
-------------------

1) Unzip the Extension to the extension directory path specified by you in the Directories Section of civicrm.
2) Go to Administers -> System Settings -> Manage Extensions.
3) Click on Add New and hit Refresh
4) If everything is fine then you should see your extension listed after hitting Refresh.
5) Click Install And hurray your done installing Ebs Gateway Payment Processor.

Configuration Steps:
--------------------

1) Login into CiviCRM admin panel.
2) Go to Administers -> System Settings -> Payment Processors.
3) Click on 'Add Payment Processor' button. New payment processor page will open.
4) Choose 'Payment Processor Type' as 'EBS Payment gateway'
5) Enter Name and Description in the specific fields.
6) Click on the corresponding checkboxes for making the processor active (enable) and for setting default.

6) Give Processor Details for Live Payments,
	Account ID = your account id
	Secret Key = your secret key
	Site Url = https://secure.ebs.in/pg/ma/sale/pay

7) Give Processor Details for Test Payments
	Account ID = 5880
	Secret Key = ebskey
	Site Url = https://secure.ebs.in/pg/ma/sale/pay

8) Click Save button.

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

