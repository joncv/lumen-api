@servers(['web' => 'root@123.57.44.26'])

@setup
    $now = new DateTime();

    $environment = isset($env) ? $env : "testing";
@endsetup

@task('show', ['on' => 'web'])
	cd /home/projects/tatuq-api
    ls -laihF
@endtask

@task('env', ['on' => 'web'])
	cd /home/projects/tatuq-api
    cat .env
@endtask

@task('deploy', ['on' => 'web', 'confirm' => true])
    cd /home/projects/tatuq-api
    git pull origin {{ $branch }}
    php artisan migrate
@endtask

@after

@endafter
