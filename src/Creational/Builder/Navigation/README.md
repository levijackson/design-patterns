This backstory for this example is that the builder is responsible for building out the configuration that will be used to generate an HTML link. Not all the attributes will be used all the time so it needs to work with a minimal set of values.


* `LinkConfig.php` - the configuration class the HTML renderer will use
* `LinkConfigBuilder.php` - the builder responsible for breaking apart the logic surrounding link configuration

If we find that we're making common link configurations it may become beneficial to create a Director that would be responsible for common link configuration builds.