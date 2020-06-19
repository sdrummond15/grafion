<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_member
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$assoc = JLanguageAssociations::isEnabled();

$document = JFactory::getDocument();
$document->addStyleSheet('components/com_members/assets/css/members.css');
$document->addScript('components/com_members/assets/js/jquery.maskcpfcnpj.js');
$document->addScript('components/com_members/assets/js/jquery.maskMoney.js');
?>
<script type="text/javascript">
    Joomla.submitbutton = function (task)
    {
        if (task == 'member.cancel' || document.formvalidator.isValid(document.id('member-form')))
        {
            Joomla.submitform(task, document.getElementById('member-form'));
        }
    }
</script>
<script type="text/javascript">
    jQuery.noConflict();
    jQuery(function (cep) {
        jQuery("#jform_cep").mask("99.999-999");
        jQuery("#jform_parcelas").mask("99/99");
        jQuery("#jform_ano").mask("9999");
    });
</script>
<form action="<?php echo JRoute::_('index.php?option=com_members&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="member-form" class="form-validate">

    <?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
    <div class="form-personalizado">
        <div class="form-horizontal">
            <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', empty($this->item->id) ? JText::_('COM_MEMBER_NEW_MEMBER', true) : JText::_('COM_MEMBER_EDIT_MEMBER', true)); ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid form-horizontal-desktop">
                        <div class="span6">
                            <?php echo $this->form->renderField('photo'); ?>
                            <?php echo $this->form->renderField('obs'); ?>
                            <?php echo $this->form->renderField('ordering'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>



            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
            <div class="row-fluid form-horizontal-desktop">
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
                </div>
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
                    <?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>



            <?php if ($assoc) : ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'associations', JText::_('JGLOBAL_FIELDSET_ASSOCIATIONS', true)); ?>
                <?php echo $this->loadTemplate('associations'); ?>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>

            <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </div>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>
<script type="text/javascript">
    jQuery(function () {
        jQuery("#jform_price").maskMoney({symbol: 'R$ ',
            showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
    });
</script>