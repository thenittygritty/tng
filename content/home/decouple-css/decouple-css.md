# Decouple Your CSS From HTML using Reusable Modules

__Sass 3.2 has a wonderful method to define reusable modules called placeholders which enable us to decouple CSS from HTML while using unambiguous, semantic class names.__

A few weeks ago Ian Storm Taylor had [a great article on how to find the best way to CSS](http://ianstormtaylor.com/oocss-plus-sass-is-the-best-way-to-css/) using [Object Oriented CSS](http://oocss.org/) and the CSS preprocessor [Sass](http://sass-lang.com/).

The OOCSS view of things is that you define modules to work with and in order to change these modules - to build variants of them - you apply classes to an HTML element that change its styles accordingly.

For instance here is an easy example of a button that changes its appearance when applying classes on it.

	<button class="btn" type="button">Button</button>
	<button class="btn btn-large" type="button">Large Button</button>
	<button class="btn btn-large btn-primary" type="button">Large Primary Button</button>

Does this seem familiar to you? Well actually [this example is from Bootstrap](http://twitter.github.com/bootstrap/base-css.html#buttons). Bootstrap uses the approach of OOCSS to define modules and extends styles to define variants of these modules.

Since I am not a huge fan of abbreviations because of the confusion it may cause when working in a team let us assume `btn` is named `button` for further examples.

To me it seems like Bootstrap made the approach of modular CSS well known by developers that were not sure on how to design naming patterns for their HTML elements' classes.

## The Concept of Modules

Modules are also known in other approaches that are kind of related to the Object Oriented CSS idea. For example in [SMACSS](http://smacss.com/) modularizing your CSS plays a big role. SMACSS is a concept of designing consistent CSS to maintain flexibility throughout projects and within a team.

Please read [the section on modules](http://smacss.com/book/type-module) in SMACSS for a better understanding of how to build modules effectively.

Furthermore Nicolas Gallagher has [an approach on how he defines class names](http://nicolasgallagher.com/about-html-semantics-front-end-architecture/) and some more naming conventions which are somewhat related to the [BEM approach](http://bem.github.com/bem-method/html/all.en.html) developed by Yandex. These conventions help you to develop your own naming style for your modules.

To come back to Ian Sorm Taylor's article let us look at the method he provides to define class names on HTML elements more semanically while decoupleing HTML from CSS.

First off we want to look at an example of how to define the above buttons using OOSass as Ian describes it. Your HTML would look something like this:

	<button class="button" type="button">Button</button>
	<button class="button-large" type="button">Large Button</button>
	<button class="button-large-primary" type="button">Large Primary Button</button>

The styles for these buttons can be defined as follows in Sass:

	.button {
		// Styles for a button
	}

	.button-large {
		@extend .btn;
		// More styles for large buttons
	}

	.button-large-primary {
		@extend .btn-large;
		// More styles for a large primary button
	}

Writing Sass this way ensures that we do not need to touch the HTML when we want to change the appearance of a large primary button for example. You can do it in styles only - decoupled.

In a lot of cases you want to change your large primary button to a normal sized button which would need a class name change in your HTML. We don't want to do this. We do not like to change classes in our HTML as this might require a change within a part of the app of which we are not necessarily the boss of. Styling is our domain!

> Those classes sprinkled all over your HTML are going to change, and that’s not gonna be fun.
>
> – [OOCSS + Sass = The best way to CSS](http://ianstormtaylor.com/oocss-plus-sass-is-the-best-way-to-css/), Ian Storm Taylor

This is the major reason why you should keep your CSS names away from the things it intends to do. A large primary button may become a normal primary button or a button may become a large primary button. You cannot be sure about what the intent of the element might be – except the semantical meaning of the element on the page.

Creating semantic class names decouples the CSS from your HTML. Semantic class names do not need to change just because the styling changes since the job of an element remains as is.

This is exactly the point Ian tries to make with his approach to OOSass. He gives examples of modules that you can define withouth a meaning, semantic-less, and reuse them when it is appropriate.

## Building a module

So let's go on and build a module for the button we just created. Modules are especially useful for reuse. You can define modules once and use them on multiple websites with different design but the same intention.

Some interesting features landed in Sass 3.2. One of them are [placeholders](http://sass-lang.com/docs/yardoc/file.SASS_REFERENCE.html#placeholder_selectors_) that work exactly like any other rule you define in Sass with the exeption that they are not actually printed within the compiled CSS when you don't use them. Generally you prefix placeholders with `%` followed by the placeholder's name. You can then apply them by using `@extend`.

So with this knowledge in mind let us define a button module that we can use whenever appropriate by sticking to the idea that Ian described.

We define some styles for a default button:

	%button {
		background: #111;
		color: #fff;
		border: 0;
		padding: 0.5em 1em;
	}

A large button basically has the same styling as this button but it needs to be a bit bigger:

	%button-large {
		@extend %button;
		font-size: 1.3em;
	}

Since we defined `padding` using `em` we do not need to do anything to increase the padding of the button.

Now when we are dealing with a primary Call-to-Action button all that should change compared to a "normal" button is the background color:

	%button-primary {
		@extend %button;
		background: #27aae2;
	}

For a primaty large button we just need to merge both the large style button and the primary style.

	%button-primary-large {
		@extend %button-primary;
		@extend %button-large;
	}

Let us use the button-module for a Call-To-Action button on a home page that asks the user to download a white-paper. It could be named (semantic class name) `download-whitepaper`. In Sass you are now able to apply the styles from your button modules while using a simple `@extend` call:

	.download-whitepaper {
		@extend %button-primary-large;
	}

See the full example module in [this gist](https://gist.github.com/36fd59a9a0916f2f5c2d).

## The CSS

Here is the output of the compiled CSS:

	.download-whitepaper {
	  background: #111;
	  color: #fff;
	  border: 0;
	  padding: 0.5em 1em;
	}

	.download-whitepaper {
	  font-size: 1.3em;
	}

	.download-whitepaper {
	  background: #27aae2;
	}

The output can be found in the [aforementioned gist](https://gist.github.com/36fd59a9a0916f2f5c2d), too.

This is not the best you can get out of CSS, since you could easily combine all rules into one without the repeated selector. But there is more to it.

We just created a whole module with four different variations of a button that is easily reusable. We are not chained to a specific structure in HTML and we do not need to include a bunch of classes on an element just to change the appearance. We are not dependant on any other component of our app other than styles. We have decoupled our HTML fully from CSS.

And as mentioned before another advantage of Sass' placeholders is the fact that they are only compiled into CSS when they are effectivly used. So every module you don't need in your site is not in your CSS if you compile your styles correctly.

## Conclusion

Decoupling components of your website or app are essential to be able to work independently from HTML and JavaScript.

With Sass 3.2's placeholders it is straightforward to define modules that you can reuse on every element by simply extending the module's variant to the element's class.

This can be especially handy for huge websites that reuse a lot of code in different variations and in teams where you build upon existing code.

__Site note:__ This technique is not new. There have been others noticing how easy you can decoulpe CSS using Sass. [Harry Roberts](http://csswizardry.com/) for example uses this style of writing modules in his CSS framework inuit.css in the [`arrow`-module](https://github.com/csswizardry/inuit.css/blob/master/inuit.css/objects/_arrows.scss). Also Joshua Johnson wrote about placeholders in Sass and [their value when dealing with grids](http://designshack.net/articles/css/semantic-grid-class-naming-with-placeholder-selectors-in-sass-3-2/). And as pointed out Ian Storm Taylor wrote a great article on how to use placeholders in Sass.