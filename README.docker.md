# Docker Setup Instructions

## Prerequisites

- Docker
- Docker Compose
- Git

## Setup Steps

1. Copy `.env.example` to `.env` and update the values:
```bash
cp .env.example .env
# Edit .env with your desired values
```

2. Add these entries to your `/etc/hosts` file:
```
127.0.0.1 solidarity.local
127.0.0.1 solidforms.local
```

2. Build and start the Docker containers:
```bash
docker compose up -d
```

The setup script will automatically:
- Create the database
- Install composer dependencies
- Set up configuration files
- Run database migrations
- Create a test user

## Services

- Backend: http://solidarity.local
- Frontend: http://solidforms.local
- Adminer (Database Management): http://localhost:8080
  - System: MySQL
  - Server: mariadb
  - Username: root
  - Password: rootpass
  - Database: solid
- MailHog (Email Testing): http://localhost:8025
- Redis: localhost:6379

## Common Commands

```bash
# Start containers
docker compose up -d

# Stop containers
docker compose down

# View logs
docker compose logs -f

# Rebuild containers
docker compose up -d --build

# Access PHP container
docker compose exec php bash

# Run composer commands
docker compose exec php composer install

# Run database migrations
docker compose exec php php bin/doctrine orm:schema-tool:update --force

# Clear Redis cache
docker compose exec redis redis-cli FLUSHALL
```

## Configuration

The project configuration is managed through environment variables in the `.env` file:

- `MYSQL_ROOT_PASSWORD`: Database root password
- `MYSQL_DATABASE`: Database name
- `MYSQL_USER`: Database user
- `MYSQL_PASSWORD`: Database password

## Directory Structure

- `docker/` - Docker-related configuration files
  - `nginx/conf.d/` - Nginx virtual host configurations
  - `php/` - PHP configuration
  - `scripts/` - Setup and utility scripts
