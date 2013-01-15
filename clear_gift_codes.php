<?php
	
	// ==============================================================================
	// Add this function to the end of the file `mod.cartthrob_gift_certificates.php`
	// ==============================================================================

	public function clear_gift_codes()
	{
		$this->EE->load->library(array('template_helper'));

		$gift_certificates = (array) $this->EE->cartthrob->cart->meta('gift_certificates');

		$code = $this->EE->TMPL->fetch_param('code');

		if ($code)
		{
			if (in_array($code, $gift_certificates))
			{
				$key = array_search($code, $gift_certificates);
				unset($gift_certificates[$key]);
			}

			$this->EE->cartthrob->cart->set_meta('gift_certificates',  $gift_certificates)->save();
		}
		else
		{
			$this->EE->cartthrob->cart->set_meta('gift_certificates',  array())->save();
		}
		
		$this->EE->template_helper->tag_redirect($this->EE->TMPL->fetch_param('return'));
	}