<?php
// source: C:\xampp\htdocs\study\sandbox\app\presenters/templates/Teacher/registerTeacher.latte

class Template004ddad16f8240c0eeedcf08faba2f9c extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('a4435c2909', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbab9366df58_content')) { function _lbab9366df58_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
        
  <fieldset>
	<legend>Registered teacher to course</legend>
        

    
    <p>Zaregistrovat předměty</p>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["registerTeacherForm"], array()) ?>

	<div class="task-form">
<?php if (is_object($form)) $_l->tmp = $form; else $_l->tmp = $_control->getComponent($form); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render('errors') ?>

                <?php if ($_label = $_form["teacher"]->getLabel()) echo $_label  ?>
 <?php echo $_form["teacher"]->getControl() ?>

                
		<?php if ($_label = $_form["course"]->getLabel()) echo $_label  ?> <?php echo $_form["course"]->getControl() ?>

                
                <?php echo $_form["submit"]->getControl() ?>

	</div>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

</fieldset> 
   
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbdc786a7f76_title')) { function _lbdc786a7f76_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Můj blog</h1>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php
}}