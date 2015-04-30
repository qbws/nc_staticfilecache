<?php
/**
 * LoginDeniedConfiguration
 *
 * @package Hdnet
 * @author  Tim Lochmüller
 */

namespace SFC\NcStaticfilecache\Cache\Rule;

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * LoginDeniedConfiguration
 *
 * @author Tim Lochmüller
 */
class LoginDeniedConfiguration {

	/**
	 * Check LoginDeniedConfiguration
	 *
	 * @param TypoScriptFrontendController $frontendController
	 * @param string                       $uri
	 * @param array                        $explanation
	 * @param bool                         $skipProcessing
	 *
	 * @return array
	 */
	public function check($frontendController, $uri, $explanation, $skipProcessing) {
		$loginDeniedCfg = (!$frontendController->config['config']['sendCacheHeaders_onlyWhenLoginDeniedInBranch'] || !$frontendController->loginAllowedInBranch);
		if (!$loginDeniedCfg) {
			$explanation[__CLASS__] = 'LoginDeniedCfg is true';
		}
		return array(
			'frontendController' => $frontendController,
			'uri'                => $uri,
			'explanation'        => $explanation,
			'skipProcessing'     => $skipProcessing,
		);
	}
}