# Sample of robots.txt for Wordpress

The below is the sample `robots.txt` for Wordpress site. Please make a `robots.txt` in the root directory of your website and copy & paste the code. Some plugins allows you to edit `robots.txt` from the administrative page.

> Please note that in the code below it’s assumed that the Wordpress is installed in the root directory of website. If your Wordpress is installed in the sub directory, the paths will change.

```
User-Agent: *
Allow: /?display=wide
Allow: /wp-content/uploads/
Disallow: /wp-content/plugins/
Disallow: /readme.html
Disallow: /refer/
Disallow: /xmlrpc.php
```