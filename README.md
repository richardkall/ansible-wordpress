# ansible-wordpress

> Ansible playbook for configuring development and production servers with WordPress.

This playbook will install and configure MySQL, WordPress, Nginx, and PHP-FPM. Vagrant is used to provision development servers and this comes with a basic Vagrantfile for an easy setup.

## Requirements

- [Ansible](http://www.ansible.com)
- [Vagrant](http://www.vagrantup.com)
- [VirtualBox](http://www.virtualbox.org)

## Usage

### Development

Install [vagrant-vbguest](https://github.com/dotless-de/vagrant-vbguest) to always keep VirtualBox Guest Additions up-to-date (optional):

```bash
$ vagrant plugin install vagrant-vbguest
```

Add hostname to `/etc/hosts`.

Run `vagrant up` to create and provision virtual machine.

### Production

Create an inventory file and a group vars file, both named `production`. See development files for details.

Provision Amazon EC2 instances with:

```bash
$ ansible-playbook site.yml --private-key <private_key.pem> -i production -u ubuntu
```

If you want to run specific tasks, add `--tags <tag>` when running `ansible-playbook`.

## Configuration

All Ansible configration is done in [YAML](http://www.yaml.org).

The following must always be defined as group variables:

- `env` *development*
- `host` *example.dev*
- `site_name` *Example Site*
- `wp_admin_email` *admin@example.dev*
- `wp_admin_password` *password*
- `wp_db_password` *password*
- `wp_root` */srv/example.com/wordpress*

### Import database

A database can be imported by specifying the dump path as `wp_db_import`. Ansible will automatically replace site URL with `hostname` and all user passwords to `wp_admin_password`.

```yaml
# group_vars/development
wp_db_import: database.sql.gz
```

### WordPress Plugins

Plugins can be installed automatically by defining `wp_plugins`.

```yaml
# group_vars/wordpress
wp_plugins:
  - { name: akismet, version: 3.0.1 }
  - { name: jetpack, version: 3.0.2 }
```

### Delete sample content

Delete all WordPress content (sample comments, posts etc.) with:

```yaml
# group_vars/development
wp_delete_content: true
```

**Important:** Remember to remove the `wp_delete_content` variable or set it to `false` before provisioning the server again.

More role defaults can be found in `roles/<role>/defaults/main.yml` and easily overwritten using group variables.

### Synced folders

Enable virtual machine [folder sync](https://docs.vagrantup.com/v2/synced-folders/) in your Vagrantfile.

```ruby
# Vagrantfile
Vagrant.configure("2") do |config|
  config.vm.synced_folder "../example-theme", "/srv/example.com/wordpress/wp-content/themes/example-theme", nfs: true
end
```

## License

Copyright © 2014 [Richard Käll](http://richardkall.se). Licensed under the MIT license.
