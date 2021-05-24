<?php

namespace App\Domain\CotutoriaAlumno\Service;

use App\Domain\CotutoriaAlumno\Repository\CotutoriaAlumnoCreatorRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class CotutoriaAlumnoCreator
{
    /**
     * @var CotutoriaAlumnoCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param CotutoriaAlumnoCreatorRepository $repository The repository
     */
    public function __construct(CotutoriaAlumnoCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param array $data The form data
     *
     * @return int The new user ID
     */
    public function createCotutoriaAlumno(array $data): int
    {
        // Input validation
        // $this->validateNewCotutoriaAlumno($data);

        // Insert user
        $cotutoriaId = $this->repository->insertCotutoriaAlumno($data);

        // Logging here: User created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $cotutoriaId;
    }

    // /**
    //  * Input validation.
    //  *
    //  * @param array $data The form data
    //  *
    //  * @throws ValidationException
    //  *
    //  * @return void
    //  */
    // private function validateNewCotutoriaAlumno(array $data): void
    // {
    //     $errors = [];

    //     // Here you can also use your preferred validation library

    //     if (empty($data['username'])) {
    //         $errors['username'] = 'Input required';
    //     }

    //     if (empty($data['email'])) {
    //         $errors['email'] = 'Input required';
    //     } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    //         $errors['email'] = 'Invalid email address';
    //     }

    //     if ($errors) {
    //         throw new ValidationException('Please check your input', $errors);
    //     }
    // }
}