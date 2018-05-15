# Fluid Templating Engine - Dagou Edition
EXT:dagou_fluid provides some useful ViewHelpers on website development.

#### Content.TypoScriptViewHelper
This ViewHelper helps you to render TypoScript.

    <df:content.typoScript objectPath="" />
    <df:content.typoScript>...</df:content.typoScript>

- `objectPath` (string) TypoScript object path.
- `cache` (boolean) Enable cache or not. Default `true`.

#### Content.FlashMessageViewHelper
This ViewHelper helps you to iterate the Flash Messages.

    <df:content.flashMessage as="...">...</df:content.flashMessage>

- `as` (string) Iteration variable name. **Required**.
- `identifier` (string) Flash-message queue identifier.
- `severity` (string) Optional severity, must be one of `\TYPO3\CMS\Core\Messaging\AbstractMessage` constants.
- `flush` (boolean) Flush or not. Default `true`.

#### Html.ScriptViewHelper
This ViewHelper helps you to load .JS library, file, or inline code in your Fluid template.

	<df:html.script src="..." />
	<df:html.script>...</df:html.script>

- `name` (string) Asset name.
- `src` (string) Asset path.
- `library` (boolean) Is library or not.
- `footer` (boolean) Add to footer or not.

#### Html.StyleViewHelper
This ViewHelper helps you to load .CSS library, file, or inline code in your Fluid template.

	<df:html.style src="..." />
	<df:html.style>...</df:html.style>

- `name` (string) Asset name.
- `src` (string) Asset path.
- `library` (boolean) Is library or not.

#### Http.RedirectViewHelper
This ViewHelper allow you to redirect page.

	<df:http.redirect url="..." />
	<df:http.redirect>...</df:http.redirect>

- `url` (string) The target URL to redirect to.
- `httpStatus` (string) An optional HTTP status header.

#### Link.QqViewHelper
This ViewHelper helps you to create a URL for QQ message.

	<df:link.qq qq="..." />
	<df:link.qq>...</df:link.qq>

- `qq` (string) QQ number.

#### Link.TelViewHelper
This ViewHelper helps you to create a URL for dialing.

	<df:link.tel tel="..." />
	<df:link.tel>...</df:link.tel>

- `tel` (string) Phone number.