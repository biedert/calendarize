<?php
/**
 * Link to anything ;)
 *
 * @package Calendarize\ViewHelpers\Link
 * @author  Tim Lochmüller
 */

namespace HDNET\Calendarize\ViewHelpers\Link;

use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Link\PageViewHelper;

/**
 * Link to anything ;)
 *
 * @author Tim Lochmüller
 */
abstract class AbstractLinkViewHelper extends PageViewHelper {

	/**
	 * Get the right page Uid
	 *
	 * @param $pageUid
	 * @param $contextName
	 *
	 * @return int
	 */
	protected function getPageUid($pageUid, $contextName) {
		if (MathUtility::canBeInterpretedAsInteger($pageUid)) {
			return (int)$pageUid;
		}

		// by settings
		if ($this->templateVariableContainer->exists('settings')) {
			$settings = $this->templateVariableContainer->get('settings');
			if (isset($settings[$contextName]) && MathUtility::canBeInterpretedAsInteger($settings[$contextName])) {
				return (int)$settings[$contextName];
			}
		}

		return (int)$GLOBALS['TSFE']->id;
	}
}
