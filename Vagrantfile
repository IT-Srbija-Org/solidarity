# -*- mode: ruby -*-
# vi: set ft=ruby :
# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.
  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.

  config.vm.box = "bento/ubuntu-20.04"
  config.vm.synced_folder "./", "/vagrant", :owner => "vagrant", :group => "www-data"
  config.vm.network "private_network", ip: "192.168.25.42"
#   config.vm.boot_timeout = 120

  config.vm.provision :shell, path: "bootstrap.sh"
  
  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  config.vm.provider "virtualbox" do |v|
     v.memory = 1024
     v.cpus = 1
     v.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
#      v.customize ["modifyvm", :id, "--cableconnected1", "on"]
  end
end