# Deployment server info
set :application, "HelpdeskOS"
set :domain, "192.168.0.138"
set :deploy_to, "/home/piero/sources/produccion"
set :app_path, "app"
set :web_path, "web"
set :maintenance_basename, "maintenance"
 
# SCM info
set :repository, "https://github.com/recchia/helpdeskOS.git"
set :scm, :git
set :deploy_via, :remote_cache
 
set :model_manager, "doctrine"
 
# Role info. I don't think this is particularly important for Capifony...
role :web, domain # Your HTTP server, Apache/etc
role :app, domain # This may be the same as your `Web` server
role :db, domain, :primary => true # This is where Symfony2 migrations will run
 
# General config stuff
set :keep_releases, 10
set :shared_files, ["app/config/parameters.yml"] # This stops us from having to recreate the parameters file on every deploy.
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]
set :permission_method, :acl
set :use_composer, true
 
# Confirmations will not be requested from the command line.
set :interactive_mode, false
 
# The following line tells Capifony to deploy the last Git tag.
# Since Jenkins creates and pushes a tag following a successful build this should always be the last tested version of the code.
#set :branch, `git tag`.split("\n").last
 
# User details for the production server
set :user, "piero"
set :use_sudo, false
ssh_options[:forward_agent] = true
ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "KEY FILE NAME")]
default_run_options[:pty] = true
 
 
# Uncomment this if you need more verbose output from Capifony
#logger.level = Logger::MAX_LEVEL
 
# Run migrations before warming the cache
#before "symfony:cache:warmup", "symfony:doctrine:migrations:migrate"
 
# Custom(ised) tasks
#namespace :deploy do
# Apache needs to be restarted to make sure that the APC cache is cleared.
# This overwrites the :restart task in the parent config which is empty.
#desc "Restart Apache"
#task :restart, :except => { :no_release => true }, :roles => :app do
#run "sudo service nginx restart"
#puts "--> Nginx successfully restarted".green
#end
#end
