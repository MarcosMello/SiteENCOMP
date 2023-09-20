<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;


class MakeRepositoryInterface extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository-interface {name}';

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
    protected $type = 'RepositoryInterface';

    /**
     * @return string
     */
    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/make-repository-interface.stub';
    }

    /**
     * @return array[]
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the interface.'],
        ];
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Repository\Interfaces';
    }

    /**
     * @param string $stub
     * @param string $name
     * @return array|string|string[]
     */
    protected function replaceClass($stub, $name): array|string
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericRepositoryInterface', $this->argument('name'), $stub);
    }
}
