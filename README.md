# The redirector
The redirector of [kernellab.site](http://r.kernellab.site). This can redirect using DNS only.
If you considered to use third level domain eg:r.example.com, just copy index.php to web document root. If you are using second level domain remove the line ```unset($server_array[2]);```

*Then* make ```*.r.domain.com IN A <yourserver IP>```

**Readymade redirector**
make the cname record at DNS
```www.domain.com``` IN CNAME ```www.new-domain.com.r.kernellab.site```
