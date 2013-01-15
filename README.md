# Cartthrob Gift Certificates - clear_gift_codes

## Description
This function works with the Cartthrob Gift Certificates add-on version 1.1.
Similar to Carthrob's `clear_coupon_codes` function, `clear_gift_codes` clears all gift certificates or a specific gift certificate from being redeemed.

## Why?
Well, Why not? We see there was a function to clear coupon codes, so why not add it to the gift certificates as well. So, VOILA!

## Installation
1. Copy the function from `clear_gift_codes.php`.
2. Open the file `mod.cartthrob_gift_certificates.php` located in the `cartthrob_gift_certificates` folder.
3. Paste the code before the last closing curly brace in the file `mod.cartthrob_gift_certificates.php`

## Example ExpressionEngine markup:

#### Add the `redeem_gift_certificate_form`
Add this to a template_group and template of your choice _(we placed it in the store.group/cart.html)_.
```html
{exp:cartthrob_gift_certificates:redeem_gift_certificate_form return="/store/cart" error_handling="inline"}
	<input type="text" name="gift_certificate_code" >
	<input type="submit" value="Redeem Gift" >

	{!-- Display errors with error_handling="inline" set --}
	{if errors_exist}
		<ul>
		{errors}
			<li>{error}</li>
		{/errors}
		</ul>
	{/if}

	{if "{exp:cartthrob_gift_certificates:applied}" > "$0.00"}
		<p>Gift Amount Applied: <strong>{exp:cartthrob_gift_certificates:applied}</strong></p>
		{exp:cartthrob_gift_certificates:active_gift_certificates}
			<p>{gift_certificate_code} <a href="/store/remove-gift-codes/{gift_certificate_code}">Remove</a></p>
		{/exp:cartthrob_gift_certificates:active_gift_certificates}
		<a href="/store/remove-gift-codes">Remove all gift certificates</a>
	{/if}
{/exp:cartthrob_gift_certificates:redeem_gift_certificate_form}
```

#### Add remove-gift-codes.html file
This can be in a template group of your choice _(we placed it in the store.group)_. When the user clicks on the link to remove the specific code, the `{segment_3}` variable is passed as the parameter to the function and removes only that code if it is set. If there is no code parameter set, then all codes are removed.
```html
{exp:cartthrob_gift_certificates:clear_gift_codes return="/store/cart" code="{segment_3}"}
```
## Parameters

#### `return`
Specify a path to redirect the user after clearing the code(s).

#### `code`
Specify a code to clear. Handy when there is more than one active code.

## Notes
This has only been tested with Cartthrob version 2.2.5 and Cartthrob Gift Certificates version 1.1.

## Many Thanks to:
#### Team Reusser for their continued support!
#### And, the Carthrob Development Team for their developer documentation!