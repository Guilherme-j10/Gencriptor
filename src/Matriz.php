<?php

	namespace elevenstack\Gencriptor;

	/**
	 * class Gencriptor
	 * 
	 * @author Guilherme Campos <https://github.com/Guilherme-j10>
	 * @package src
	*/
    class Matriz
    {
		/**
		 * contains lowercase letters
		 * @var array mincat
		*/
        const mincat = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
		
		/**
		 * contains uppercase letters
		 * @var array maicat
		*/
		const maicat = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
		
		/**
		 * contains numbers
		 * @var array number
		*/
		const number = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
		
		/**
		 * contains special caracteres
		 * @var array special
		*/
		const special = ['@', '#', '%', '&', '/', '?', '!', '-'];

		/**
		 * contains the matrix for encryption
		 * @var array matriz_encript
		*/
		const matriz_encript = [
			'&zsf' => '0',
			'/h7H' => '1',
			'u%a7' => '2',
			'pO8T' => '3',
			'M@pY' => '4',
			'dMEu' => '5',
			'X0lW' => '6',
			'A95T' => '7',
			'2vCN' => '8',
			'H6nT' => '9',
			'8G4x' => 'a',
			'HiKF' => 'b',
			'5!de' => 'c',
			'Omif' => 'd',
			'xnqK' => 'e',
			'J!Xn' => 'f',
			'WiKu' => 'g',
			'8aUr' => 'h',
			'214b' => 'i',
			'WgJN' => 'j',
			'-MK9' => 'k',
			'oOcH' => 'l',
			'0xmk' => 'm',
			'C3En' => 'n',
			'cEuJ' => 'o',
			'H?T%' => 'p',
			'mPps' => 'q',
			'D6TL' => 'r',
			'vOe-' => 's',
			'XwmM' => 't',
			'1GF-' => 'u',
			'G/Xy' => 'v',
			'jeyP' => 'w',
			'DI-W' => 'x',
			'LkX4' => 'y',
			'FRA6' => 'z',
			'G2Rw' => ' '
		];
    }