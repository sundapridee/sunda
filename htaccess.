<IfModule mod_autoindex.c>
    Options -Indexes
</IfModule>

# Blok akses langsung ke file sensitif
<FilesMatch "\.(sql|ini|sh|bak|git|php~|htaccess)$">
    Order allow,deny
    Deny from all
</FilesMatch>
