# wordpress-testing

A custom WordPress theme scaffold built for experimentation with **WooCommerce**. Ships only the theme and lightweight tooling — no WordPress core, no database, no `wp-config.php`.

## What's inside

```
wp-content/themes/wptesting/   # the custom theme
composer.json                  # PHP CodeSniffer + WordPress Coding Standards
.editorconfig
.gitignore
```

The theme is a classic PHP theme (not block/FSE) that declares `add_theme_support('woocommerce')` and uses hooks to integrate with the WooCommerce plugin. Sample content is generic placeholder copy.

## Install

Either drop the theme directly into a WordPress install:

```bash
cp -R wp-content/themes/wptesting /path/to/wp-content/themes/
```

…or symlink during local development:

```bash
ln -s "$(pwd)/wp-content/themes/wptesting" /path/to/wp-content/themes/wptesting
```

Then in `wp-admin`:

1. **Plugins → Add New** → install & activate **WooCommerce**.
2. **Appearance → Themes** → activate **WP Testing**.
3. Run the WooCommerce setup wizard so the Shop / Cart / Checkout / My Account pages exist.

## Required plugins

| Plugin | Why |
|---|---|
| [WooCommerce](https://wordpress.org/plugins/woocommerce/) | Provides the product CPT, cart, checkout, payments. The theme declares support but does not bundle it. |

## Dev tooling

```bash
composer install        # installs PHPCS + WPCS
composer lint           # runs phpcs against the theme
composer lint:fix       # auto-fixes what phpcbf can
```

## Theme structure (high level)

- `style.css` — theme metadata header (Theme Name, Version, etc.) plus base CSS reset
- `functions.php` — entry point; requires the files in `inc/`
- `inc/theme-setup.php` — `add_theme_support` calls, nav menu registration
- `inc/enqueue.php` — front-end style/script registration
- `inc/woocommerce.php` — WC hook customizations (wrappers, columns, per-page)
- `inc/template-tags.php` — small reusable template helpers
- Top-level templates: `header.php`, `footer.php`, `front-page.php`, `single.php`, `page.php`, `archive.php`, `search.php`, `404.php`, `sidebar.php`, `searchform.php`, `index.php`
- `template-parts/` — partials used by the templates above
- `assets/` — CSS, JS, images served by the theme

**No WooCommerce template overrides are bundled.** Customize WC output through hooks in `inc/woocommerce.php`; only copy WC plugin templates into the theme if a hook can't accomplish the change.

## Out of scope (intentionally)

- WordPress core files
- `wp-config.php` / database dumps
- A custom plugin or CPT (WooCommerce provides products)
- JS/CSS bundler — assets are served as plain files
- CI / GitHub Actions

## License

MIT
