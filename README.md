# Fluid Templating Engine - Dagou Edition
EXT:dagou_fluid provides some useful ViewHelpers on website development.

#### Content.FlashMessageViewHelper
This ViewHelper iterates the Flash Messages.

    <df:content.flashMessage as="...">...</df:content.flashMessage>

- `as` (string) Iteration variable name. **Required**.
- `identifier` (string) Flash-message queue identifier.
- `severity` (string) Optional severity, must be one of `\TYPO3\CMS\Core\Messaging\AbstractMessage` constants.
- `flush` (boolean) Flush or not. Default `true`.

#### Content.TypoScriptViewHelper
This ViewHelper renders the TypoScript.

    <df:content.typoScript objectPath="" />
    <df:content.typoScript>...</df:content.typoScript>

- `objectPath` (string) TypoScript object path.
- `cache` (boolean) Enable cache or not. Default `true`.

#### Format.NumberViewHelper
This ViewHelper formats a number with grouped thousands. See [number_format()](http://php.net/manual/en/function.number-format.php) in php.net

    <df:format.number number="..." />
    <df:format.number>...</df:format.number>
    
- `number` (float) The number being formatted.
- `decimals` (int) Sets the number of decimal points. Default `0`
- `decPoint` (string) Sets the separator for the decimal point. Default `.`
- `thousandsSep` (string) Sets the thousands separator. Default `,` 

#### Html.ScriptViewHelper
This ViewHelper loads a .JS library, file, or inline code in a Fluid template.

	<df:html.script src="..." />
	<df:html.script>...</df:html.script>

- `name` (string) Asset name.
- `src` (string) Asset path.
- `library` (boolean) Is library or not.
- `footer` (boolean) Add to footer or not. Default `true`
- `compress` (boolean) Should compress or not.
- `top` (boolean) Force on top or not.

#### Html.StyleViewHelper
This ViewHelper loads a .CSS library, file, or inline code in a Fluid template.

	<df:html.style src="..." />
	<df:html.style>...</df:html.style>

- `name` (string) Asset name.
- `src` (string) Asset path.
- `library` (boolean) Is library or not.
- `compress` (boolean) Is compressed or not.
- `top` (boolean) Is forced on top or not.

#### Http.GetViewHelper
This ViewHelper acquirea a GET variables.

	<df:http.get variables="..." />

- `variables` (string) The variables to get.

#### Http.RedirectViewHelper
This ViewHelper redirects to a new page.

	<df:http.redirect url="..." />
	<df:http.redirect>...</df:http.redirect>

- `url` (string) The target URL to redirect to.
- `httpStatus` (string) An optional HTTP status header.

#### Link.QqViewHelper
This ViewHelper creates a URL for QQ chatting.

	<df:link.qq qq="..." />
	<df:link.qq>...</df:link.qq>

- `qq` (string) QQ number.

#### Link.TelViewHelper
This ViewHelper creates a URL for dialing.

	<df:link.tel tel="..." />
	<df:link.tel>...</df:link.tel>

- `tel` (string) Phone number.