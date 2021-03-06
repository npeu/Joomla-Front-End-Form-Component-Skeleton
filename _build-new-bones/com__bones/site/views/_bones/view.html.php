<?php
/**
 * @package     Joomla.Site
 * @subpackage  com__bones
 *
 * @copyright   Copyright (C) {{OWNER}} {{YEAR}}.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;

// Load the Admin language file to avoid repeating form language strings:
$lang = JFactory::getLanguage();
$extension = 'com__bones';
$base_dir = JPATH_COMPONENT_ADMINISTRATOR;
$language_tag = 'en-GB';
$reload = true;
$lang->load($extension, $base_dir, $language_tag, $reload);

/**
 * HTML View class for the _Bones Component
 */
class _BonesView_Bones extends JViewLegacy
{
    // Overwriting JView display method
    function display($tpl = null)
    {
        $user = JFactory::getUser();


        // We may not actually want to show the form at this point (though we could if we wanted to
        // include the form AND the list on the same page - especially if it's displayed via a
        // modal), but it's useful to have the form so we can retrieve language strings without
        // having to manually redeclare them, along with any other properties of the form that may be
        // useful:
        //$this->setModel($this->getModel('_bones'));
        #jimport('joomla.application.component.model');
        #JModelLegacy::addIncludePath(JPATH_SITE . '/components/com__bones/models');
        require JPATH_SITE . '/components/com__bones/models/_bone.php';
        $_bones_model = JModelLegacy::getInstance('_Boneform', '_BonesModel');
        #echo '<pre>'; var_dump($_bones_model); echo '</pre>'; exit;
        $form = $_bones_model->getForm();
        #echo '<pre>'; var_dump($form); echo '</pre>'; exit;


        $app    = JFactory::getApplication();
        $menus  = $app->getMenu();
        $menu   = $menus->getActive();

        // Get the parameters
        $this->com_params  = JComponentHelper::getParams('com__bones');
        $this->menu_params = $menu->params;

        $layout = $this->getLayout();
        if ($layout != 'default') {
            $breadcrumb_title = $breadcrumb_title  = JText::_('COM_BONES_PAGE_TITLE_' . strtoupper($layout));

            #echo '<pre>'; var_dump($breadcrumb_title); echo '</pre>'; exit;

            $app     = JFactory::getApplication();
            $pathway = $app->getPathway();
            $pathway->addItem($breadcrumb_title);
        }

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

            return false;
        }

        // Assign data to the view:
        $this->items = $this->get('Items');
        #$this->items = $this->get('AllItems');
        #$this->items = $this->get('UnpublishedItems');

        $this->user  = $user;
        $this->title = $menu->title;
        $this->form  = $form;

        // Display the view
        parent::display($tpl);
    }
}
