Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network :private_network, ip: "10.10.10.10"

  # config.vm.synced_folder "<LOCAL_PATH>", "<REMOTE_PATH>",
  #   owner: "vagrant",
  #   group: "www-data",
  #   mount_options: ["dmode=776", "fmode=775"]

  config.vm.provider :virtualbox do |v|
    v.memory = 1024
  end

  config.vm.provision :ansible do |a|
    a.inventory_path = "development"
    a.limit = "all"
    a.playbook = "site.yml"
  end
end
