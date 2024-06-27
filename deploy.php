<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'yes');
set('ssh_type', 'native');  // Make sure this is correct
set('http_user', 'www-data');
set('writable_mode', 'chmod');
set('use_relative_symlink', '0');
set('ssh_multiplexing', false);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('94.198.218.15')
    ->set('repository', 'https://github.com/coremraz/parts-shop.git')
    ->set('hostname', '94.198.218.15')
    ->set('remote_user', 'root')
    ->set('deploy_path', '~/myapp');

// Hooks

after('deploy:failed', 'deploy:unlock');
