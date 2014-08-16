default_run_options[:pty] = true
ssh_options[:config] = false
ssh_options[:forward_agent] = true
set :use_sudo, false

set :user, "tgd"

set :application, "webapp"
set :domain,      "thegooddata.org"

set :repository,  "git@github.com:thegooddata/webapp.git"
set :scm,         :git
  
set  :keep_releases,  10
set  :yii_console,  "www/protected/yiic"

# Dirs that need to remain the same between deploys (shared dirs)
set :shared_children,   %w(assets protected/runtime protected/messages uploads)

before "deploy:finalize_update", "deploy:move_TGD_to_current"
after "deploy:update_code", "deploy:rename_main_file"  

task :production do
  ssh_options[:port] = 21950
  role :web,        "lnd-app00.#{domain}"
  role :app,        "lnd-app00.#{domain}"
  role :db,         "lnd-app00.#{domain}", :primary => true

  set :deploy_to,   "/srv/webapp/"
  set :branch, "master"
  set :env_sufix, "prod"
end

task :staging do
  ssh_options[:port] = 21950
  role :web,        "lnd-app00-pre.#{domain}"
  role :app,        "lnd-app00-pre.#{domain}"
  role :db,         "lnd-app00-pre.#{domain}", :primary => true

  set :deploy_to,   "/srv/webapp/"
  set :branch, "develop"
  set :env_sufix, "pre"
end

namespace :deploy do
  
  task :rename_main_file do
    run "mv #{release_path}/protected/config/main.#{env_sufix}.php #{release_path}/protected/config/main.php"
    run "mv #{release_path}/protected/config/local_config.#{env_sufix}.php #{release_path}/protected/config/local_config.php"
    run "ln -nfs #{shared_path}/config.php #{release_path}/protected/config/"
  end
  
  task :move_TGD_to_current do
    run "mv #{release_path}/TGD/protected #{release_path}/protected"
    run "mv #{release_path}/TGD/themes #{release_path}/themes"
    run "mv #{release_path}/TGD/.htaccess #{release_path}/"
    run "mv #{release_path}/TGD/* #{release_path}/"
    run "rmdir #{release_path}/TGD/"
  end
  
end