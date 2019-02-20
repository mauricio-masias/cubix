ErrorDocument 404 http://masias.co.uk/

# compress text, html, javascript, css, xml:
AddOutputFilterByType DEFLATE text/plain
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE text/css
AddOutputFilterByType DEFLATE application/xml
AddOutputFilterByType DEFLATE application/xhtml+xml
AddOutputFilterByType DEFLATE application/rss+xml
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript


# Or, compress certain file types by extension:
<files *.html>
SetOutputFilter DEFLATE
</files>


<IfModule mod_headers.c>
   <FilesMatch "\.(js|css|xml|gz)$">
       Header append Vary Accept-Encoding
   </FilesMatch>
   <FilesMatch "\.(ico|jpe?g|png|gif|swf)$">
       Header set Cache-Control "public"
   </FilesMatch>
   <FilesMatch "\.(css)$">
       Header set Cache-Control "public"
   </FilesMatch>
   <FilesMatch "\.(js)$">
       Header set Cache-Control "private"
   </FilesMatch>
   <FilesMatch "\.(x?html?|php)$">
       Header set Cache-Control "private, must-revalidate"
   </FilesMatch>
</IfModule>


<IfModule mod_deflate.c>
# Insert filter
SetOutputFilter DEFLATE

# Netscape 4.x has some problems...
BrowserMatch ^Mozilla/4 gzip-only-text/html

# Netscape 4.06-4.08 have some more problems
BrowserMatch ^Mozilla/4\.0[678] no-gzip

# NOTE: Due to a bug in mod_setenvif up to Apache 2.0.48
# the above regex won't work. You can use the following
# workaround to get the desired effect:
BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html

# Don't compress images
SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png|ico)$ no-gzip
</IfModule>

<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule ^(.*)\.(\d+)(_m_\d+)?\.([^\.]+)$    $1.$4    [L,QSA]
</IfModule>


<IfModule mod_expires.c>
ExpiresActive On
ExpiresDefault "access plus 1 month"
ExpiresByType image/x-icon "access plus 1 year"
ExpiresByType image/gif "access plus 1 month"
ExpiresByType image/png "access plus 1 month"
ExpiresByType image/jpg "access plus 1 month"
ExpiresByType image/jpeg "access plus 1 month"
ExpiresByType text/css "access 1 month"
ExpiresByType application/javascript "access plus 1 year"
ExpiresByType application/x-font-woff   "access plus 1 year"
ExpiresByType application/x-javascript "access plus 1 year"
</IfModule>