<?php
// source: C:\xampp\htdocs\study\sandbox\app\presenters/templates/Student/registerCourses.latte

class Template9b0b4430d53c01ed919e3acbc34ccd54 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('78c5558b3f', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbb3b44d1aab_content')) { function _lbb3b44d1aab_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    
     <p>Registered courses</p>
    <table class="tasks">
<thead>
	<tr>
		
		<th>Course</th>
		<th></th>
		
	</tr>
</thead>

<tbody>
<?php $iterations = 0; foreach ($courses as $post) { ?>
	<tr>
		<td><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></td>
                <td><a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("UnregisterSubject!", array($post->id_course)), ENT_COMPAT) ?>
">UNREGISTER</a> </td>
		
	</tr>
<?php $iterations++; } ?>
</tbody>
</table>

    
  <fieldset>
	<legend>register courses</legend>
        

    
    <p>Zaregistrovat předměty</p>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["registerCourseForm"], array()) ?>

	<div class="task-form">
<?php if (is_object($form)) $_l->tmp = $form; else $_l->tmp = $_control->getComponent($form); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render('errors') ?>

		<?php if ($_label = $_form["courses"]->getLabel()) echo $_label  ?> <?php echo $_form["courses"]->getControl() ?>

                <?php if ($_label = $_form["semester"]->getLabel()) echo $_label  ?>
 <?php echo $_form["semester"]->getControl() ?>

                
                <?php echo $_form["submit"]->getControl() ?>

	</div>
	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

</fieldset> 
   
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb097589aba6_title')) { function _lb097589aba6_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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