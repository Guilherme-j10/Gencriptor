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
		public function encString(string $string): String
		{
			$arr_string = preg_split("/(?<!^)(?!$)/u", $string);
			$output = '';

			for($i = 0; $i < count($arr_string); $i++){
				foreach(self::matriz_encript as $chave => $value){
                    if($value === $arr_string[$i]){
                        $output .= $chave;
                    }
                }
			}

			return $this->secur_hash($output, true);
		}

		/**
		 * add security 
		 * 
		 * @param string $hash encrypted string
		 * @param bool $add_secur add or remove security
		*/
		private function secur_hash(string $hash, bool $add_secur): String
		{
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
		public function decString(string $string): String
		{
			$securiti = $this->secur_hash($string, false);
			$string = preg_split("/(?<!^)(?!$)/u", $securiti);

            $index_value = count($string) / 4;
            $a = 0;
            $output = '';

            do {
                
                $index = 4 * $a;

                if($index == 4){
                    $index = 0;
                }elseif($index > 4){
                    $index = $index - 4;
                }

                for($i = $index; $i < 4 * $a; $i++){
                    $output .= $string[$i];
                }

                $output = $output.' ';

                $a++;
            } while ($a <= $index_value);

            $final_result = '';
            $explode_code = explode(' ', $output);

            for($j = 0; $j < count($explode_code); $j++){
                foreach(self::matriz_encript as $chave => $valor){
                    if($chave === $explode_code[$j]){
                        $final_result .= $valor;
                    }
                }
            }

            return trim($final_result);
		}

		/**
		 * returns specified amounts of encrypted string
		 * 
		 * @param int $size specifies the quantity to be returned
		 * @param bool $special_caractere whether it will contain special characters or not
		*/
		public function getstring_secur(int $size, bool $special_caractere): String
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
		public function getstringhash(bool $special_caractere): String
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
