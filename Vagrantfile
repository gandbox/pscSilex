Vagrant.configure(2) do |config|
  config.vm.synced_folder "./", "/var/www"
  # config.proxy.http  = "http://10.34.6.100:3128/"
  # config.proxy.https = "https://10.34.6.100:3128/"

  config.vm.provider "docker" do |d|
    d.cmd = ["/sbin/my_init", "--enable-insecure-key"]
    d.build_dir = "./Docker" # specifies the path to the Dockerfile
    d.ports << '8080:80'     # Forwards port 8080 from the host to the Docker Container port 80
    d.has_ssh = true
  end
  
  config.ssh.port = "22"
  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
  config.ssh.username = "root"
  config.ssh.private_key_path = "phusion.key"

  config.vm.provision "shell", inline: "supervisord --nodaemon &"

  # Specific to the Silex project (need to write cache / generate CSS from less)
  config.vm.provision "shell", inline: "chown -R www-data:www-data /var/www/web/cache/ &"
  config.vm.provision "shell", inline: "chown -R www-data:www-data /var/www/web/css/style.css &"
end
