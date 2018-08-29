<?php

	class Linker {
		
		protected $db;

		public function __construct() {
			$this->db = new Mysqli('localhost', 'root', '', 'link');
		}

		public function createLink( $url ) {

			$url = $this->validateLink( $url );

			if ( $url ) {

				$short_link = $this->createShortLink();


				$find_url = $this->db->query("SELECT short_link FROM 'links' WHERE url = '{$url}'");

				if ( $find_url->num_rows ) {

			     return $find_url->fetch_object()->short_link;

		    } else {

		    	$short_link = $this->createShortLink();

		    	$this->db->query("INSERT INTO links(url, short_link) VALUES ('{$url}', '{$short_link}')");

		    	return $short_link;

		    }

			} else {

					return '';
			}

		}

		public function createShortLink() {

			$symbols = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890"; //Выбираем символы

			$short_link = substr(str_shuffle($symbols), 0, 5);

			// Проверяем короткую ссылку на уникальность
			$short_link = $this->db->real_escape_string($short_link);

			$check_short_link = $this->db->query("SELECT short_link FROM links WHERE short_link = '{$short_link}'");

			if ( $check_short_link->num_rows ) {

				createShortLink();

			} else {

				return $short_link;

			}

		}

		public function validateLink( $url ) {

			$url = trim($url);

			if ( !filter_var($url, FILTER_VALIDATE_URL) ) {

				return '';

			} else {

				return $this->parsingUrl( $url );

			}

		}

		function parsingUrl($parsed_url) {

			$host = preg_replace("#^https?://#", "", $parsed_url);

			$parsed_url = parse_url($parsed_url);

			if (isset($parsed_url['scheme'])) {

				$scheme = $parsed_url['scheme'] . '://';

				return $scheme . $host;

			} else {

				$scheme = 'http://';

				return $scheme . $host;

			}

		}

		public function getUrl($short_link) {

			$short_link = $this->db->real_escape_string($short_link);

			$short_link = $this->db->query("SELECT url FROM links WHERE short_link = '$short_link'");

			if( $short_link->num_rows ) {

	     return $short_link->fetch_object()->url;

	    }

	    return '';

		}



	}