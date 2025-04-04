# Uputstva za Docker instalaciju

## Preduslovi

- Docker
- Docker Compose
- Git

## Koraci za podešavanje

1. Kopirajte `.env.example` u `.env` i ažurirajte vrednosti:
```bash
cp .env.example .env
# Izmenite .env sa željenim vrednostima
```

2. Dodajte ove unose u vaš `/etc/hosts` fajl:
```
127.0.0.1 solidarity.local
127.0.0.1 solidforms.local
```

3. Izgradite i pokrenite Docker kontejnere:
```bash
docker compose up -d
```

Skripta za podešavanje će automatski:
- Kreirati bazu podataka
- Instalirati composer zavisnosti
- Podesiti konfiguracione fajlove
- Pokrenuti migracije baze podataka
- Kreirati test korisnika

## Servisi

- Backend: http://solidarity.local
- Frontend: http://solidforms.local
- Adminer (Upravljanje bazom podataka): http://localhost:8080
  - Sistem: MySQL
  - Server: mariadb
  - Korisničko ime: root
  - Lozinka: rootpass
  - Baza podataka: solid
- Redis: localhost:6379
- Redis Insight (Redis upravljački interfejs): http://localhost:5540

## Uobičajene komande

```bash
# Pokretanje kontejnera
docker compose up -d

# Zaustavljanje kontejnera
docker compose down

# Pregled logova
docker compose logs -f

# Ponovno građenje kontejnera
docker compose up -d --build

# Pristup PHP kontejneru
docker compose exec php bash

# Pokretanje composer komandi
docker compose exec php composer install

# Pokretanje migracija baze podataka
docker compose exec php php bin/doctrine orm:schema-tool:update --force

# Čišćenje Redis keša
docker compose exec redis redis-cli FLUSHALL
```

## Konfiguracija

Konfiguracija projekta se upravlja kroz promenljive okruženja u `.env` fajlu:

- `MYSQL_ROOT_PASSWORD`: Root lozinka za bazu podataka
- `MYSQL_DATABASE`: Ime baze podataka
- `MYSQL_USER`: Korisnik baze podataka
- `MYSQL_PASSWORD`: Lozinka za bazu podataka

## Struktura direktorijuma

- `docker/` - Konfiguracioni fajlovi vezani za Docker
  - `nginx/conf.d/` - Nginx konfiguracije virtualnih hostova
  - `php/` - PHP konfiguracija
  - `scripts/` - Skripte za podešavanje i uslužne skripte
