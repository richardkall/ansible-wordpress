Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network :private_network, ip: "10.10.10.10"

  # config.vm.synced_folder "../example-theme", "/srv/example.com/wordpress/wp-content/themes/example-theme", nfs: true

  config.vm.provider :virtualbox do |v|
    v.memory = 1024
    v.name = "wordpress"
  end

  config.vm.provision :ansible do |a|
    a.inventory_path = "development"
    a.limit = "all"
    a.playbook = "site.yml"
  end
end
