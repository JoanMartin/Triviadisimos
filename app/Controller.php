<?php

	class Controller {
		public function homePage() {
			require __DIR__ . '/templates/home_page.php';
		}

		public function userMainPage() {
			require __DIR__ . '/templates/user_main_page.php';
		}
	}