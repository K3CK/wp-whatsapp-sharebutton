# WhatsApp Share Button for WordPress

The plugin simply configures a shortcode to add a WhatsApp sharing button wherever you need it in WordPress.
No fancy settings page or complicated configuration. Just add the shortcode in the WP editor or
in your theme's templates.

Example usage in the WordPress editor:

```
[whatsapp-sharebutton button_label="Share with WhatsApp"]
```

Example usage in your theme's templates:

```
<?php echo do_shortcode( '[whatsapp-sharebutton button_label="Share with WhatsApp"]' ); ?>
```

## Possible attributes of the shortcode

| Attribute name  | Description | Default |
| ------------- | ------------- | ------------- |
| button_label  | The button label and link title. By default it is only used in the title attribute of the link. Change the buttons CSS to show also the label (hidden by font-size: 0). | ''  |
| message_text  | The text of the generated WhatsApp message.  | The title of the current post/page (i.e. the return value of WordPress' `get_the_title()` function)  |
| target_url  | The URL to add to the generated WhatsApp message. | The URL of the current post/page (i.e. the return value of WordPress' `get_permalink()` function)  |
| message_link_separator  | The separator of the message_text and target_url.  | ': '  |
| wrapper_class  | The CSS class(es) of the button's surrounding div tag.  | 'whatsapp_sharebutton_wrap'  |
| button_class  | The CSS class(es) of the button itself. | 'whatsapp_sharebutton' |

