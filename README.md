# ansible-wordpress

> Ansible playbook for configuring development and production servers with WordPress.

This playbook will install and configure MySQL, WordPress, Nginx, and PHP-FPM. Vagrant is used to provision development servers and this comes with a basic Vagrantfile for an easy setup.

## Requirements

- [Ansible](http://www.ansible.com)
- [Vagrant](http://www.vagrantup.com)
- [VirtualBox](http://www.virtualbox.org)

## Usage

### Development

1. Add hostname to `/etc/hosts`.
2. Run `vagrant up` to create and provision virtual machine.
