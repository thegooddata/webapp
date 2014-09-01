# TheGoodData
## Deployment HOWTO

In order to be able to deploy a new release, first of all you need to ask for access to our sysadmin.

### Technologies used

- [Ruby](https://www.ruby-lang.org)
- [Bundler](https://github.com/bundler/bundler)
- [capistrano v2.15.5](https://github.com/capistrano/capistrano/tree/legacy-v2) Ruby Gem

### Procedure

Install Ruby for your platform.

Install [Ruby gems](https://rubygems.org/).

Install Bunlder:
``` bash
gem install bundler
```
From the project root execute the following:
``` bash
bundle install
```

### Deployment

To deploy all you need to do is execute the following (depending on the environment you want to deploy to)
``` bash
cap [production|staging] deploy
``` 

For more deployment options check the [config/deploy.rb](config/deploy.rb) file