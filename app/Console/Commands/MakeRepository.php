<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class MakeRepository extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name} {--interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * @return string
     */
    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/make-repository.stub';
    }

    /**
     * @return array[]
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the repository.'],
            ['interface', 'i', InputOption::VALUE_NONE, 'Create a new interface for the repository'],
        ];
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Repository';
    }

    /**
     * @param string $stub
     * @param string $name
     * @return array|string|string[]
     */
    protected function replaceClass($stub, $name): array|string
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericRepository', $this->argument('name'), $stub);
    }

    /**
     * @return false|void
     * @throws FileNotFoundException
     */
    public function handle()
    {
        if(parent::handle() === false) {
            return false;
        }

        if($this->option('interface')) {
            $this->call('make:repository-interface', ['name' => $this->getNameInput() . 'Interface']);
        }
    }
}
