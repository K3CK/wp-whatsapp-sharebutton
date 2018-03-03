=== WhatsApp Share Button for Developers ===
Contributors: martinkeck
Tags: whatsapp, share, button
Requires at least: 4.8
Tested up to: 4.9.4
Requires PHP: 5.4
Stable tag: 1.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Adds a configurable share button for WhatsApp via shortcode.

== Description ==
The plugin simply configures a shortcode to add a WhatsApp sharing button wherever you need it in WordPress.
No fancy settings page or complicated configuration. Just add the shortcode in the WP editor or in your theme's templates.

Example usage in the WordPress editor:
<pre><code>[whatsapp-sharebutton button_label="Share on WhatsApp"]
</code></pre>

Example usage in your theme's templates:
<pre><code>&lt;?php echo do_shortcode( '[whatsapp-sharebutton button_label="Share on WhatsApp"]' ); ?&gt;
</code></pre>

Possible attributes of the shortcode:

<table>
<thead>
<tr>
<th>Attribute name</th>
<th>Description</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>button_label</td>
<td>The button label and link title. By default it is only used in the title attribute of the link. Change the buttons CSS to show also the label (hidden by font-size: 0).</td>
<td>''</td>
</tr>
<tr>
<td>message_text</td>
<td>The text of the generated WhatsApp message.</td>
<td>The title of the current post/page (i.e. the return value of WordPress' <code>get_the_title()</code> function)</td>
</tr>
<tr>
<td>target_url</td>
<td>The URL to add to the generated WhatsApp message.</td>
<td>The URL of the current post/page (i.e. the return value of WordPress' <code>get_permalink()</code> function)</td>
</tr>
<tr>
<td>message_link_separator</td>
<td>The separator of the message_text and target_url.</td>
<td>': '</td>
</tr>
<tr>
<td>wrapper_class</td>
<td>The CSS class(es) of the button's surrounding div tag.</td>
<td>'whatsapp_sharebutton_wrap'</td>
</tr>
<tr>
<td>button_class</td>
<td>The CSS class(es) of the button itself.</td>
<td>'whatsapp_sharebutton'</td>
</tr></tbody></table>

== Installation ==
1. Visit \'Plugins > Add New\'
2. Search for \'Whatsapp Share Button\'
3. Activate the plugin from your Plugins page.
4. Add the shortcode in your posts/pages or theme\'s templates.

== Changelog ==
= 1.0.0 =
Release of initial version.