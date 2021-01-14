<?php

namespace App\Interfaces;

interface Stateful
{
		public function get($id);
			/** $filter is array<array> of col|condition|val
			 * [
    	 *	['status', '=', '1'],
    	 *  ['subscribed', '<>', '1'],
			 * ]
			 */
		public function list($filter);
		/**
		 * $input is a named property array of col|val
		 * mappings.
		 */
		public function create($input);
		public function update($id, $input);
		public function delete($id);
}
