<?php

/**
 * CLC 2
 * UserService 1
 * Authors: Dylan Dorn, Daniel Cender, Nathaniel Kumar, Ray Omoregie
 * 1-10-2021
 * File that contains the functions required for managing user data
 *
 */
namespace App\Services\Business;
use App\Services\Data\DAO;

class JobPostingService
{
    private $jobsDAO;
		private $usersDAO;
    function __construct() {
        $this->jobsDAO = new DAO('job_postings');
        $this->usersDAO = new DAO('users');
    }

		// TODO: Everything else

	}
