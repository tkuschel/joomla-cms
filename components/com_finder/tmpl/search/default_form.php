<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/*
* This segment of code sets up the autocompleter.
*/
if ($this->params->get('show_autosuggest', 1))
{
	$this->document->getWebAssetManager()->usePreset('awesomplete');
	$this->document->addScriptOptions('finder-search', array('url' => Route::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component')));
}

?>

<form action="<?php echo Route::_($this->query->toUri()); ?>" method="get" class="js-finder-searchform">
	<?php echo $this->getFields(); ?>
	<fieldset class="com-finder__search word mb-3">
		<legend class="com-finder__search-legend sr-only">
			<?php echo Text::_('COM_FINDER_SEARCH_FORM_LEGEND'); ?>
		</legend>
		<div class="form-inline">
			<label for="q" class="mr-2">
				<?php echo Text::_('COM_FINDER_SEARCH_TERMS'); ?>
			</label>
			<div class="input-group">
				<input type="text" name="q" id="q" class="js-finder-search-query form-control" value="<?php echo $this->escape($this->query->input); ?>">
				<span class="input-group-append">
				<button type="submit" class="btn btn-primary">
					<span class="icon-search icon-white" aria-hidden="true"></span>
					<?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?>
				</button>
				<?php if ($this->params->get('show_advanced', 1)) : ?>
					<a href="#advancedSearch" data-toggle="collapse" class="btn btn-secondary">
						<span class="icon-search-plus" aria-hidden="true"></span>
						<?php echo Text::_('COM_FINDER_ADVANCED_SEARCH_TOGGLE'); ?></a>
				<?php endif; ?>
				</span>
			</div>
		</div>
	</fieldset>

	<?php if ($this->params->get('show_advanced', 1)) : ?>
		<fieldset id="advancedSearch" class="com-finder__advanced js-finder-advanced collapse<?php if ($this->params->get('expand_advanced', 0)) echo ' show'; ?>">
			<legend class="com-finder__search-advanced sr-only">
				<?php echo Text::_('COM_FINDER_SEARCH_ADVANCED_LEGEND'); ?>
			</legend>
			<?php if ($this->params->get('show_advanced_tips', 1)) : ?>
				<div class="com-finder__tips card card-outline-secondary mb-3">
					<div class="card-body">
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_INTRO'); ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_AND'); ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_NOT'); ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_OR'); ?>
						<?php if ($this->params->get('tuplecount', 1) > 1) : ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_PHRASE'); ?>
						<?php endif; ?>
						<?php echo Text::_('COM_FINDER_ADVANCED_TIPS_OUTRO'); ?>
					</div>
				</div>
			<?php endif; ?>
			<div id="finder-filter-window" class="com-finder__filter">
				<?php echo HTMLHelper::_('filter.select', $this->query, $this->params); ?>
			</div>
		</fieldset>
	<?php endif; ?>
</form>