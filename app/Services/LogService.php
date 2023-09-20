<?php

namespace App\Services;

use App\Repository\Interfaces\LogRepositoryInterface;

class LogService
{
    private LogRepositoryInterface $logRepository;

    /**
     * @param LogRepositoryInterface $logRepositoryInterface
     */
    public function __construct(LogRepositoryInterface $logRepositoryInterface)
    {
        $this->logRepository = $logRepositoryInterface;
    }

    /**
     * Returns a collection of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(): \Illuminate\Support\Collection
    {
        return $this->logRepository->all()->each(function ($log) {
            $variables = explode(';;', $log->log);
            $log->variables = [
                'first' => $variables[0],
                'second' => $variables[1]
            ];

            if (isset($variables[2])) $log->variables['third'] = $variables[2];
        });
    }

    /**
     * Creates a new log
     *
     * @param int $createdId
     * @param string $createdName
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(int $createdId, string $createdName, string $category): \Illuminate\Database\Eloquent\Model
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $logMessage = '[' . $user->id . ' - ' . $user->name . '];;[' . $createdId . ' - ' . $createdName . ']';
        return $this->logRepository->create(['log' => $logMessage, 'category' => $category]);
    }
}
