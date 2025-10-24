# WebShopping

Professional WebShopping — a production-minded e-commerce web application built primarily with PHP and Hack, with supporting JavaScript, CSS and HTML. This single README combines a concise professional project overview with a concrete Functions & Tasks backlog to guide development, onboarding, and contribution.

[![Language](https://img.shields.io/badge/Primary-PHP%20%2F%20Hack-blue)]()
[![Status](https://img.shields.io/badge/Status-Active-green)]()
[![License](https://img.shields.io/badge/License-MIT-lightgrey)]()

---

## Professional overview

WebShopping is an extensible e-commerce platform designed for local and regional stores, marketplaces, and demo storefronts. It focuses on reliable catalog management, secure checkout, inventory control, promotions, and operational reporting. The codebase contains PHP and Hack code (HHVM), with frontend behaviors in JavaScript and styling in CSS/HTML.

Intended audiences:
- Backend engineers integrating payment providers and shipping services
- Frontend developers building storefront and admin UI
- DevOps teams deploying the app to Docker, cloud or on-prem environments
- Product owners and small retailers who want a customizable web store

Core goals:
- Secure and extensible checkout flow with idempotent payment handling
- Reliable inventory and order lifecycle management
- Clear separation between domain logic and adapters (DB, payment, mail)
- Developer-friendly scaffolding and tests for fast iteration

---

## Key features

- Product catalog with categories, tags, images, attributes, and variants
- Shopping cart and persistent customer carts (sessions / user carts)
- Checkout flow with shipping options, taxes, coupons, and payments
- Order lifecycle: pending, paid, fulfilled, shipped, refunded
- User accounts, guest checkout, addresses, and order history
- Admin area for product, inventory, orders, promotions, and reports
- Inventory management with reservations/holds to prevent oversell
- Promotions engine (discount codes, per-product / cart rules)
- Search and filtering (basic SQL search; extendable to full-text or Elastic)
- Notifications (email receipts, shipping updates) with pluggable adapters
- Audit logs for orders and admin actions
- Tests and CI-friendly configuration; Docker compose for local dev

---

## Technology & recommended stack

- Languages: PHP (core), Hack (HHVM portions if used), JavaScript, HTML, CSS
- Frameworks: If present in repo, follow the included framework; otherwise typical choices:
  - PHP: Laravel / Symfony / Slim (or plain PHP)
  - Hack: HHVM toolchain (where used)
- Runtime: PHP 7.4+ or PHP 8.x; HHVM if using Hack
- Database: MySQL / MariaDB or PostgreSQL (repo-dependent)
- Build/tools: Composer (PHP), npm/yarn for frontend assets
- Testing: PHPUnit / Pest, JS tests as appropriate
- Optional: Redis for sessions and cart caching; Elasticsearch for search
- Containerization: Docker + docker-compose for local development

---

## System requirements

- PHP 7.4+ or PHP 8.x (or HHVM if using Hack)
- Composer installed
- Node.js + npm/yarn for frontend build
- MySQL/MariaDB or PostgreSQL for persistence
- Optional: Redis for caching/sessions
- Docker & Docker Compose (recommended for local dev)

---

## Quick start — build & run

The exact commands depend on the repository structure. Use the common flows below and adjust paths to match this repo.

1. Install dependencies
```bash
composer install
npm install   # if frontend assets present
```

2. Create configuration
- Copy .env.example to .env and update:
  - DB connection details (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
  - APP_URL, APP_ENV, APP_KEY/secret
  - PAYMENT_PROVIDER settings, MAIL settings, STORAGE (S3) credentials

3. Provision the database
- If SQL migration tooling is present, run migrations and seed:
```bash
php artisan migrate --seed      # Laravel example
# or
vendor/bin/phinx migrate        # Phinx example
# or run provided SQL scripts in the repo using mysql client:
mysql -u root -p < database/schema.sql
mysql -u root -p < database/seed.sql
```

4. Build frontend (if applicable)
```bash
npm run build
# or for dev
npm run dev
```

5. Run the app locally
```bash
php -S localhost:8000 -t public     # simple built-in PHP server
# or start via framework command
php artisan serve --host=0.0.0.0 --port=8000
```

6. Docker (recommended)
If a docker-compose.yml is provided, start app + DB:
```bash
docker-compose up --build
```

---

## Configuration notes

- Centralize secrets in .env and do NOT commit .env to the repo.
- Use environment-specific configs for payment providers, mail, and file storage.
- For Hack/HHVM code, ensure the runtime matches the code expectations (HHVM version).

---

## Security & privacy highlights

- Never log or store raw card numbers; integrate a PCI-compliant provider (Stripe, Adyen).
- Use HTTPS in production and secure cookie/session settings.
- Sanitize and validate all inputs; use prepared statements or ORM to avoid SQL injection.
- Rate-limit authentication endpoints and implement account lockouts for repeated failures.

---

## Functions & Tasks (combined — implementation backlog)

This section lists core functions and prioritized tasks (P0 = must have, P1 = important, P2 = nice-to-have). Each item includes acceptance criteria, test guidance, and suggests how to convert into issues.

### Core functions

1. Product Catalog & Inventory
   - Description: Products, categories, attributes, images, and stock tracking.
   - Acceptance:
     - CRUD for products with images and variants
     - Stock levels updated on order placement and release on cancellation/refund
   - Tests: unit tests for product service; integration tests for stock updates

2. Shopping Cart & Session Management
   - Description: Persistent cart for logged-in users and session-based guest carts.
   - Acceptance:
     - Items can be added/removed/updated; totals calculated correctly
     - Merging guest cart with user cart on login
   - Tests: service tests for cart merge and calculation

3. Checkout & Payments
   - Description: Checkout flow with shipping, tax, coupon, and payment integration.
   - Acceptance:
     - Checkout is idempotent (X-Idempotency-Key) and transactional: payment success → order paid; payment failure → hold released
     - Payments handled via adapter interface and webhook verification implemented
   - Tests: simulate payment provider responses and replays

4. Orders & Fulfillment
   - Description: Order lifecycle management with statuses and history.
   - Acceptance:
     - Order moves through defined states; administrators can update fulfillment status
     - Order audit trail exists
   - Tests: integration tests for state transitions

5. User Accounts & Authentication
   - Description: Registration, login, password reset, profiles.
   - Acceptance:
     - Secure password storage (bcrypt/argon2), email verification option
   - Tests: auth unit tests; integration tests for flows

6. Admin Area
   - Description: Admin UI/APIs to manage products, orders, promotions, and reports.
   - Acceptance:
     - Proper RBAC: only admin roles access admin functions
   - Tests: security tests for role enforcement

7. Promotions & Coupons
   - Description: Discount codes, per-product and cart-level rules.
   - Acceptance:
     - Coupon validation, stacking rules, expiry checks
   - Tests: unit tests for discount calculations

8. Search & Filtering
   - Description: Search by product name, category, tags; filter by price/attributes.
   - Acceptance:
     - Correct search results and stable pagination
   - Tests: seeded-data integration tests; consider full-text in DB or external search

9. Notifications & Emails
   - Description: Order confirmation, shipping notification, password reset.
   - Acceptance:
     - Pluggable mail adapter; emails templated and localizable
   - Tests: mock mail adapter in tests

10. Reporting & Exports
    - Description: Sales reports, inventory reports, exportable CSVs.
    - Acceptance:
      - Reports match transactional data and support date-range filters
    - Tests: report validation against seeded transactions

11. Auditing & Logging
    - Description: Track critical actions (who/what/when) and provide searchable logs.
    - Acceptance:
      - Audit entries persisted for order and admin actions
    - Tests: audit verification on key flows

12. Background Jobs & Scheduled Tasks
    - Description: Order cleanup, abandoned-cart emails, inventory synchronization.
    - Acceptance:
      - Jobs are idempotent, observable, and safe for retries
    - Tests: job integration tests

---

### Suggested data model (high level)

- User { id, email, passwordHash, displayName, roles[], createdAt }
- Product { id, sku, title, description, price, currency, attributes, images[], stockLevel, createdAt }
- Variant { id, productId, sku, attributes, price, stockLevel }
- Category { id, name, slug }
- Cart { id, userId?, items[{productId, variantId?, qty, price}], totals, createdAt }
- Order { id, userId?, items[], totals, shippingAddress, billingAddress, status, paymentInfo, createdAt }
- Payment { id, provider, providerRef, status, amount, currency, capturedAt }
- Promotion { id, code, type, discount, rules, expiresAt }
- Audit { id, entityType, entityId, action, actorUserId, details, timestamp }

---

### Prioritized implementation tasks (backlog)

P0 — Core (must have)
- Task: Provision database schema and seed data; add migration scripts
  - Complexity: low-medium
  - Tests: migrations run in CI; seed data for integration tests
- Task: Product CRUD + image handling + inventory management
  - Complexity: medium
  - Tests: service + integration tests
- Task: Cart + Checkout + Payment adapter (mocked)
  - Complexity: high
  - Tests: idempotency, concurrency tests for stock reservation
- Task: Basic authentication & user accounts
  - Complexity: medium

P1 — Important
- Task: Admin area for product/order/promotions management
  - Complexity: medium
- Task: Promotions engine and coupon validation
  - Complexity: medium
- Task: Notifications (email adapter) and templates
  - Complexity: low-medium
- Task: Docker + docker-compose for app + DB + Redis
  - Complexity: low

P2 — Enhancements
- Task: Full-text search integration (Elastic / DB full-text)
  - Complexity: medium
- Task: Analytics dashboards and CSV exports
  - Complexity: medium
- Task: Migrate parts to Hack/HHVM where performance-critical (if repo uses Hack)
  - Complexity: medium-high
- Task: CI with Testcontainers or DB service in GitHub Actions
  - Complexity: low-medium

---

## Example API sketches

- GET /api/products
- GET /api/products/{id}
- POST /api/cart
- POST /api/checkout  (X-Idempotency-Key: <key>)
- GET /api/orders/{id}
- POST /api/admin/products
- GET /api/admin/reports/sales?start=&end=

---

## Tests

- Run PHP unit tests with PHPUnit (or the test runner used in repo).
```bash
composer test
# or
vendor/bin/phpunit
```
- JS tests with npm/yarn:
```bash
npm test
```
- Integration tests: run against local DB or a Docker Compose stack; consider Testcontainers for CI.

---

## Docker example (quick dev stack)
```
version: '3.8'
services:
  web:
    build: .
    ports:
      - "8000:80"
    environment:
      - APP_ENV=development
      - DB_HOST=db
      - DB_DATABASE=webshopping
      - DB_USERNAME=root
      - DB_PASSWORD=example
    volumes:
      - ./:/var/www/html
    depends_on:
      - db
      - redis
  db:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: example
      MYSQL_DATABASE: webshopping
    ports:
      - "3306:3306"
    volumes:
      - db-data:/var/lib/mysql
  redis:
    image: redis:7
    ports:
      - "6379:6379"
volumes:
  db-data:
```

---

## Contributing

- Fork, create a feature branch, add tests, and open a clear PR with acceptance criteria.
- Add or update CONTRIBUTING.md and CODE_OF_CONDUCT.md to onboard contributors.
- Use semantic commits and include migration and seed changes in PRs that alter schema.

---

## Troubleshooting & FAQ

- "Cannot connect to DB": check DB_HOST/credentials in .env and ensure DB container/service is running.
- "Image upload fails": verify writable storage path and file permission settings.
- "Checkout/payment issues": check payment provider credentials and webhook handling.
- If the repo includes Hack code, ensure HHVM/Hack runtime versions match development expectations.

---

## License & maintainers

- License: MIT (replace with preferred license and add LICENSE file)
- Maintainer: Neyly112 / oggishi (https://github.com/Neyly112)
- Contact: add email or link in repo profile

---

Thank you for reviewing WebShopping. This README combines a professional overview with a concrete Functions & Tasks backlog you can use to create issues, plan milestones, or scaffold the initial codebase.
