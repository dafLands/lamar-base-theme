wp_lamar
===

Hi. I'm a starter theme called `wp_lamar`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in inc/custom-header.php that can be activated by uncommenting one line in functions.php and adding the code snippet found the comments of inc/custom-header.php to your header.php template.
* Custom template tags in inc/template-tags that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in /inc/extras.php that can improve your theming experience.
* Keyboard navigation for image attachment templates. The script can be found in js/keyboard-navigation.js. It’s enqueued in functions.php.
* A script at js/small-menu.js that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It’s enqueued in functions.php.
* 5 sample CSS layouts in /layouts: Two sidebars on the left, two sidebars on the right, a sidebar on either side of your content, and two-column layouts with sidebars on either side.
* Smartly organized starter CSS in style.css that will help you to quickly get your design off the ground.
* The GPL license in license.txt. :) Use it to make something cool.

Getting Started
---------------

If you want to keep it simple, head over to http://underscores.me and generate your `wp_lamar` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want to set things up manually, download `wp_lamar` from github. The first thing you want to do is copy the `wp_lamar` directory and change the name to something else — Like, say, `megatherium` — then you'll need to do a three-step find and replace on the name in all the templates.

1. Search for `'wp_lamar'` (inside single quotations) to capture the text domain.
2. Search for `wp_lamar_` to capture all the function names.
3. Search for ` wp_lamar` (with a space before it) to capture DocBlocks.
4. Search for `wp_lamar-` to capture prefixed handles.

OR

* Search for: `'wp_lamar'` and replace with: `'megatherium'`
* Search for: `wp_lamar_` and replace with: `megatherium_`
* Search for: <code>&nbsp;wp_lamar</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `wp_lamar-` and replace with: `megatherium-`

Then, update the stylesheet header in style.css and the links in footer.php with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say but harder to do: make an awesome WordPress theme. :)

Good luck!
