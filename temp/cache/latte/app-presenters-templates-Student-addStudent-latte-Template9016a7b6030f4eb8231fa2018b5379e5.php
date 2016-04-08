<?php
// source: C:\xampp\htdocs\study\sandbox\app\presenters/templates/Student/addStudent.latte

class Template9016a7b6030f4eb8231fa2018b5379e5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('22e8955dc2', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbd85edfeade_content')) { function _lbd85edfeade_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

  <fieldset>
	<legend>Crate student</legend>
        
        

	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["createStudentForm"], array()) ?>

	<div class="task-form">
<?php if (is_object($form)) $_l->tmp = $form; else $_l->tmp = $_control->getComponent($form); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render('errors') ?>

		<?php if ($_label = $_form["name"]->getLabel()) echo $_label  ?> <?php echo $_form["name"]->getControl()->addAttributes(array('size' => 30, 'autofocus' => true)) ?>

                <?php if ($_label = $_form["surname"]->getLabel()) echo $_label  ?>
 <?php echo $_form["surname"]->getControl()->addAttributes(array('size' => 30)) ?>

                   <?php if ($_label = $_form["dateOfBirth"]->getLabel()) echo $_label  ?>
 <?php echo $_form["dateOfBirth"]->getControl() ?>

                   <?php if ($_label = $_form["email"]->getLabel()) echo $_label  ?>
 <?php echo $_form["email"]->getControl() ?>

                     <?php if ($_label = $_form["password"]->getLabel()) echo $_label  ?>
 <?php echo $_form["password"]->getControl() ?>

                      <?php if ($_label = $_form["role"]->getLabel()) echo $_label  ?>
 <?php echo $_form["role"]->getControl() ?>

                 <?php if ($_label = $_form["degree"]->getLabel()) echo $_label  ?>
 <?php echo $_form["degree"]->getControl() ?>

                  <?php if ($_label = $_form["type"]->getLabel()) echo $_label  ?>
 <?php echo $_form["type"]->getControl() ?>

                <?php echo $_form["submit"]->getControl() ?>

	</div>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

</fieldset> 
   
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb61e7b1dec5_title')) { function _lb61e7b1dec5_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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