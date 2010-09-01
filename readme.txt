=== Customizable Grid Gallery FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, free, flash, grid, gallery, as3, thumbs, effects, thumb, image, full, screen, text, tooltip, animation, effects, roll, over, out, auto, scroll, css, preloader
Requires at least: 2.8.0
Tested up to: 3.0.1
Stable tag: trunk

== Description ==

An original "Customizable Grid Gallery". Completely XML customizable, without using Flash. And it's free!

= Main features =

You can integrate it in any website for free without even using Flash. The overall width and height can be customized up to 1680 x 1050 pixels. It's fully customizable and uses the Image Grid FX component, keeping the same many customizable variables of the grid and adding many text effects, image transitions and gallery properties. You can configure your XML list of text effects and image transitions. The images in the gallery can be shown as boxFit, bestFit or forceFit options. The specific properties of the Image Grid FX like  enlarging effects, CSS formatted text for tooltip, configurable images border and spacing and unlimited number of images (JPG, PNG, GIF and BMP supported) are also available.

== Installation ==

Make sure your Wordpress version is greater than 2.8 and your hosting provider is using PHP5.

1. There are two files to download: [WordPress Plugin](http://downloads.wordpress.org/plugin/customizable-grid-gallery-fx.zip "Customizable Grid Gallery FX Plugin") (that you have to install and activate) & [Free archive](http://www.flashxml.net/free/download/customizable-grid-gallery.zip "Customizable Grid Gallery FX")
2. Create a new folder inside your **wp-content** folder called **flashxml**, inside this folder create a new one called **customizable-grid-gallery-fx** and copy the content of the **free archive** there
3. If you copied the **free archive** to a location different than the one above, go to **Customizable Grid Gallery FX** from the **Settings** tab in your **WordPress Dashboard** and update the path accordingly
4. Add `[customizable-grid-gallery-fx width="600" height="400"][/customizable-grid-gallery-fx]` where you want the Flash to show up in your post/page. Don't forget to provide your own width and height values, since 600 and 400 are just examples
5. If you want to make the Customizable Grid Gallery FX part of your theme, edit the template files and add `<?php customizablegridgalleryfx_echo_embed_code(600, 400); ?>` where you want it to show up
6. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your Customizable Grid Gallery FX](http://www.flashxml.net/customizable-grid-gallery.html "Customizable Grid Gallery FX") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `wp-content/flashxml/customizable-grid-gallery-fx/settings.xml`, `wp-content/flashxml/customizable-grid-gallery-fx/dockMenu/settings.xml` and `wp-content/flashxml/customizable-grid-gallery-fx/holder/settings.xml` files accordingly
7. To use your own images, upload them to `wp-content/flashxml/customizable-grid-gallery-fx/images/` and update the `wp-content/flashxml/customizable-grid-gallery-fx/images/thumbs.xml` and `wp-content/flashxml/customizable-grid-gallery-fx/images/big.xml` files accordingly

= No Flash support text =

To support visitors without Adobe Flash Player, you can provide alternative content by adding the text between `[customizable-grid-gallery-fx width="600" height="400"]` and `[/customizable-grid-gallery-fx]`. If you made the Flash part of your theme, add the text as *the third argument* of the `customizablegridgalleryfx_echo_embed_code()` function call (for example `<?php customizablegridgalleryfx_echo_embed_code(600,400,"Alternative content"); ?>`).

= Getting rid of the FlashXML.net label =

To remove the FlashXML.net label from the top-left corner you'll need to buy the [commercial archive](http://www.flashxml.net/customizable-grid-gallery.html#swmi-license "Customizable Grid Gallery FX"). Once you'll do that, simply use the SWF file from the commercial archive to overwrite the SWF file from the `wp-content/flashxml/customizable-grid-gallery-fx/` folder.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/customizable-grid-gallery.html "Customizable Grid Gallery") is the utility that helps easily customize your Customizable Grid Gallery to fit all of your needs.