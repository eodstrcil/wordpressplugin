# A simple Wordpress plugin

## List of Activities

1. Intro
- Read developer test
- Refresh knoledge

2. Research financial API
- Create account - https://freecurrencyapi.net/
- Test API with Postman

3. Create plugin
- Programing php and JS

4. QA Test
- Install local Wordpress
- Test plugin local

5. Deploy
- Create database c2090640_wpstore
- Create subdomain wpstore.satela.com.ar
- Create SSL certified and install on server
- Create user for database
- Upload files to server
- Start wordpress instalation
- Upload plugin files
- Install plugin

6. Documentation
- Write this document
- Create repo in github
- Upload files

## Requeriment
- Add Bootstrap in your template. Add this code in you "functions.php" file

```PHP
// Include Bootstrap CSS
function bootstrap_css() {
	wp_enqueue_style( 'bootstrap_css', 
  					get_stylesheet_directory_uri() . '/css/bootstrap.min.css', 
  					array(), 
  					'5.1.3'
  					); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_css');

// Include Bootstrap JS
function bootstrap_js() {
	wp_enqueue_script( 'bootstrap_js', 
  					get_stylesheet_directory_uri() . '/js/bootstrap.min.js', 
  					array('jquery'), 
  					'5.1.3', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_js');
```
