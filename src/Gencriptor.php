<?php

	namespace elevenstack\Gencriptor;
	use elevenstack\Gencriptor\Matriz;

	/**
	 * class Gencriptor
	 * 
	 * @author Guilherme Campos <https://github.com/Guilherme-j10>
	 * @package src
	*/
	class Gencriptor extends Matriz
	{

		/** 
		* encrypt the string
		*
		* @param string $string texto/string a ser encriptada
		*/
		public function encString(string $string)
		{
			$result = '';

			$letter = array_flip(self::matriz_encript);
			foreach (str_split(strtolower($string)) as $key) {
				if (isset($letter[$key])) {
					$result .= $letter[$key];
				}
			}

			return $this->secur_hash($result, true);
		}

		/**
		 * add security 
		 * 
		 * @param string $hash encrypted string
		 * @param bool $add_secur add or remove security
		*/
		private function secur_hash(string $hash, bool $add_secur){
			switch ($add_secur) {
				case true:
					$str = str_split($hash);
					$reverse = array_reverse($str);
					return base64_encode(implode('', $reverse));
				break;
				case false:
					$content = base64_decode($hash);
					$string = str_split($content);
					$arr_reverse = array_reverse($string);
					return implode('', $arr_reverse);
				break;
				default:
					return 'invalid argument !';
				break;
			}
		}

		/** 
		 * decrypt the string
		 * 
		 * @param string $string texto/string a ser descriptada
		*/
		public function decString(string $string)
		{
			$content = $this->secur_hash($string, false);
			$string = str_split($content);

			$valor_index = count($string) / 4;
			$result = "";
			$a = 0;

			do {
				$indice = 4 * $a;

				if ($indice == 4) {
					$indice = 0;
				} elseif ($indice > 4) {
					$indice = $indice - 4;
				}

				for ($i = $indice; $i < 4 * $a; $i++) {
					$result .= $string[$i];
				}

				$result = $result . " ";

				$a++;
			} while ($a <= $valor_index);

			$trate_string = trim($result);
			$result_string = "";

			foreach (explode(" ", $trate_string) as $key => $value) {
				if ($value === "&zsf") {
					$result_string .= '0';
				}
				if (self::matriz_encript[$value]) {
					$result_string .= self::matriz_encript[$value];
				}
			}

			return trim($result_string);
		}

		/**
		 * returns specified amounts of encrypted string
		 * 
		 * @param int $size specifies the quantity to be returned
		 * @param bool $special_caractere whether it will contain special characters or not
		*/
		public function getstring_secur(int $size, bool $special_caractere)
		{
			if (is_string($size)) {
				echo "Please put a number how paramenter, not string ";
			}

			if ($special_caractere == true) {
				$string = $this->getstringhash(true);
			} else {
				$string = $this->getstringhash(false);
			}

			$password = "";

			$rand = str_shuffle($string);

			for ($i = 0; $i < $size; $i++) {
				$password .= $rand[$i];
			}

			return $password;
		}

		/**
		 * returns a complete scrambled array
		 * 
		 * @param bool $special_caractere defines whether it contains special characters or not
		*/
		public function getstringhash(bool $special_caractere)
		{
			switch ($special_caractere) {
				case true:
					$result1 = array_merge(self::mincat, self::maicat);
					$result2 = array_merge($result1, self::special);
					$finalresult = array_merge($result2, self::number);
					return implode("", $finalresult);
				break;
				case false:
					$finalresult = array_merge(self::maicat, self::number);
					return implode("", $finalresult);
				break;
				default:
					return "undefined value";
				break;
			}
		}
	}
