# **Projekt Webbsäkerhet Grupp-15**

## Update MYSQL database:
Make sure to change path if needed.
- cd C:\xampp\mysql\bin
- mysql -u root -p webshop < "C:\xampp\htdocs\securityshop\Project-Security-Shop\initSQL.sql"

## Setting up TLS
Step 1: add the row "127.0.0.1 webshop.com" last in the hosts file in windows search path example: C:\Windows\System32\drivers\etc.

Step 2: create a folder named "crt" in the apache folder search path example: F:\xampp\apache\crt.

Step 3: extract "fix cert.rar" inside "crt" folder and run the make-cert.bat, write in "webshop.com" when asked about domain and click enter for the rest of questions.

Step 4: Enter "webshop.com" folder that was just created and doubleclick on "server.crt", click "install certificate", choose "local machine", 
choose "Place all certificates in the follwing store", click browse and choose "trusted root certification authorities", then click next and finish.

Step 5: open the file "httpd-vhosts.conf", search path example: F:\xampp\apache\conf\extra, at the bottom add the following within the quotation marks:
"## webshop.com
 <VirtualHost 127.0.0.1:80>
     DocumentRoot "F:/xampp/htdocs/webshop/Project-Security-Shop"
     ServerName webshop.com
     ServerAlias *webshop.com
 </VirtualHost>
 <VirtualHost 127.0.0.1:443>
     DocumentRoot "F:/xampp/htdocs/webshop/Project-Security-Shop"
     ServerName webshop.com
     ServerAlias *.webshop.com
     SSLEngine on
     SSLCertificateFile "crt/webshop.com/server.crt"
     SSLCertificateKeyFile "crt/webshop.com/server.key"
 </VirtualHost>"

Step 6: change DocumentRoot so that it matches to the projects path.

Step 7: restart your browser and start up the server.

Step 8: open "https://webshop.com"
Now the web application should run with TLS
