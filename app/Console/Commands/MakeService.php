<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;


class MakeService extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * The type of class generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * @return string
     */
    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/make-service.stub';
    }

    /**
     * @return array[]
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service.'],
        ];
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }

    /**
     * @param string $stub
     * @param string $name
     * @return array|string|string[]
     */
    protected function replaceClass($stub, $name): array|string
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('GenericService', $this->argument('name'), $stub);
    }
}
