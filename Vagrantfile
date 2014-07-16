Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network :private_network, ip: "10.10.10.10"

  # config.vm.synced_folder "<LOCAL_PATH>", "<REMOTE_PATH>",
  #   owner: "vagrant",
  #   group: "www-data",
  #   mount_options: ["dmode=776", "fmode=775"]

  config.vm.provision :ansible do |ansible|
    ansible.inventory_path = "development"
    ansible.limit = "all"
    ansible.playbook = "site.yml"
  end
end
