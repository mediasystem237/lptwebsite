deploy:
	ssh o2switch 'cd~/lptwebsite && git pull origin main && make install'


# Cible principale pour le déploiement
install: .env public/storage vendor/autoload.php public/build/manifest.json
		php artisan cache:clear
		php artisan migrate --force
		@echo "Deployment complete."

# Crée le fichier .env à partir de .env.example
.env:
		cp .env.example .env
		php artisan key:generate

# Crée le lien symbolique pour le stockage
public/storage:
		php artisan storage:link

# Installe les dépendances PHP et génère le fichier autoload
vendor/autoload.php: composer.lock
		composer install
		touch vendor/autoload.php

# Gère les dépendances front-end et construit les fichiers
public/build/manifest.json: package.json
		npm install
		npm run build
