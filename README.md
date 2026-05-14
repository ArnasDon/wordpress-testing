# wordpress-testing

A full WordPress 6.9.4 install with a custom ecommerce theme (`wptesting`) scaffolded for WooCommerce. Drop-in ready for a host like Hostinger — point a domain at the repo root, add `wp-config.php`, and run the WordPress installer.

## What's inside

```
.                                  # WordPress 6.9.4 core
├── index.php
├── wp-admin/
├── wp-includes/
├── wp-login.php
├── ...
├── wp-config-sample.php           # rename to wp-config.php and fill in DB credentials
└── wp-content/
    ├── plugins/                   # Akismet + Hello Dolly (WP defaults)
    └── themes/
        ├── twentytwentythree/     # default theme
        ├── twentytwentyfour/      # default theme
        ├── twentytwentyfive/      # default theme
        └── wptesting/             # CUSTOM theme — WooCommerce-compatible

composer.json                      # PHP CodeSniffer + WordPress Coding Standards
.editorconfig
.gitignore                         # ignores wp-config.php, uploads/, cache/, etc.
```

## Getting started

### 1. Configure WordPress

```bash
cp wp-config-sample.php wp-config.php
# Edit wp-config.php — set DB_NAME, DB_USER, DB_PASSWORD, DB_HOST, and the secret keys
# (generate keys here: https://api.wordpress.org/secret-key/1.1/salt/)
```

### 2. Install

Visit your site URL in a browser — WordPress will run its 5-minute install wizard and create the DB tables.

### 3. Activate the custom theme + WooCommerce

In `wp-admin`:

1. **Plugins → Add New** → install & activate **WooCommerce**.
2. **Appearance → Themes** → activate **WP Testing**.
3. Run the WooCommerce setup wizard so the Shop / Cart / Checkout / My Account pages exist.

## The `wptesting` theme

Classic PHP theme that declares `add_theme_support('woocommerce')` and integrates via hooks (no copied WC templates that go stale).

- `style.css` — theme metadata header + base reset
- `functions.php` — entry point; requires the files in `inc/`
- `inc/theme-setup.php` — feature support, menus, image sizes
- `inc/enqueue.php` — front-end style/script registration
- `inc/woocommerce.php` — WC hook customizations (wrappers, columns, per-page)
- `inc/template-tags.php` — small reusable template helpers
- Top-level templates: `header.php`, `footer.php`, `front-page.php`, `single.php`, `page.php`, `archive.php`, `search.php`, `404.php`, `sidebar.php`, `searchform.php`, `index.php`
- `template-parts/` — partials used by the templates above
- `assets/` — CSS, JS, images served by the theme

## Required plugins

| Plugin | Why |
|---|---|
| [WooCommerce](https://wordpress.org/plugins/woocommerce/) | Provides the product CPT, cart, checkout, payments. The custom theme declares support but does not bundle it. |

## Dev tooling

```bash
composer install        # installs PHPCS + WPCS
composer lint           # runs phpcs against wp-content/themes/wptesting
composer lint:fix       # auto-fixes what phpcbf can
```

## License

WordPress core, default themes, and default plugins ship under their own licenses (GPL). The custom `wptesting` theme is MIT — see `wp-content/themes/wptesting/style.css`.
