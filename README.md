<<<<<<< HEAD
# Fluid Templating Engine - Dagou Edition
EXT:dagou_fluid provides some useful ViewHelpers on website development.

#### Html.ScriptViewHelper
This ViewHelper helps you to load javascript library, file, or inline code in your Fluid template.

	<df:html.script src="..." />
	<df:html.script>...</df:html.script>

Allowed attributes:

- `name` (string)
Script name, in case you want to overwrite the script source in some other place. **Only works for library and inline code.**

- `src` (string)
Script source. Allowed prefix: `http://`, `https://`, `//`, `EXT:`.

- `library` (boolean)
Whether the script is library or not.

- `footer` (boolean)
Whether add the script at the end of the page or not.
=======
# Fluid Templating Engine - Dagou edition
EXT:dagou_fluid provides some useful ViewHelpers on website development.

#### Html.ScriptViewHelper
This ViewHelper helps you to load javascript library, file, or inline code in your Fluid template.

	<df:html.script src="..." />
	<df:html.script>...</df:html.script>

Allowed attributes:

- `name` (string)
Script name, in case you want to overwrite the script source in some other place. **Only works for library and inline code.**

- `src` (string)
Script source. Allowed prefix: `http://`, `https://`, `//`, `EXT:`.

- `library` (boolean)
Whether the script is library or not.
>>>>>>> branch 'master' of https://github.com/billdagou/dagou_fluid.git

#### Html.StyleViewHelper
This ViewHelper helps you to load stylesheet library, file, or inline code in your Fluid template.

	<df:html.style src="..." />
	<df:html.style>...</df:html.style>

Allowed attributes:

- `name` (string)
Style name, in case you want to overwrite the style source in some other place. **Only works for inline code.**

- `src` (string)
Style source. Allowed prefix: `http://`, `https://`, `//`, `EXT:`.

- `library` (boolean)
Whether the Style is library or not.

#### Http.RedirectViewHelper
This ViewHelper allow you to redirect page.

	<df:http.redirect url="..." />
	<df:http.redirect>...</df:http.redirect>

Allowed attributes:

- `url` (string)
Redirection URL.

- `httpStatus` (string)
HTTP status header. Allowed value see `\TYPO3\CMS\Core\Utility\HttpUtility`;

#### Link.TelViewHelper
This ViewHelper helps you to create a URL for dialing.

	<df:link.tel tel="..." />
	<df:link.tel>...</df:link.tel>

Allowed attributes:

- `tel` (string)
Phone number.